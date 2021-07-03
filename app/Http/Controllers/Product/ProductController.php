<?php

namespace App\Http\Controllers\Product;

use App\Helpers\FileClass;
use App\Helpers\StringConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Product\StoreProductRequest;
use App\Models\Category\CategorySpec;
use App\Models\Client\Cart;
use App\Models\Client\Favorite;
use App\Models\Product\Product;
use App\Models\Product\ProductOption;
use App\Models\Product\ProductSpec;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class ProductController extends Controller
{
    protected $product;
    protected $fileClass;

    public function __construct(Product $product, FileClass $fileClass)
    {
        $this->product = $product;
        $this->fileClass = $fileClass;
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $data = $request->validated();
            DB::beginTransaction();
            $productData = [
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'user_id' => $request->user()->id,
                'description' => $data['description'],
                'price' => $data['price'],
                'img' => $this->_uploadFile($request->file('img')),
            ];
            $product = $this->product->createData($productData);
            if (empty($product)) {
                DB::rollBack();
                return ResponseHelper::operationFail();
            }
            $productSpecStatus = $this->insertProductSpecs(
                collect($data['specs']),
                $product->id,
                $product->category_id
            );
            if (empty($productSpecStatus)) {
                DB::rollBack();
                return ResponseHelper::operationFail('here');
            }

            DB::commit();
            return redirect()->route('product.show', $product->id);
        } catch (\Exception $ex) {
            DB::rollBack();
            return ResponseHelper::operationFail($ex->getMessage());
        }
    }

    private function _uploadFile($file)
    {
        $fileUri =
            $this->fileClass
            ->uploadFile(
                $file,
                StringConstants::getFileName($file->extension()),
                StringConstants::getShortPath(StringConstants::$productFolder)
            );

        return StringConstants::getFullPath($fileUri);
    }

    private function insertProductSpecs($productSpec, $productId, $categoryId)
    {
        $categorySpecs = new CategorySpec();
        $productSpecs = new ProductSpec();
        $categorySpecsData = $categorySpecs->getData(['category_id' => $categoryId]);
        $productSpecsData = array();
        $productSpecData['product_id'] = $productId;
        $productSpecData['created_at'] = Carbon::now();
        $productSpecOptionData = array();
        $index = 0;
        foreach ($categorySpecsData as $categorySpec) {

            $specData = $productSpec->firstWhere('id', $categorySpec->id);
            if (empty($specData))
                return $productSpec;
            $productSpecData['category_spec_id'] = $categorySpec->id;


            $specOptions = $specData['option'];
            $categorySpecOptions = $categorySpec->categoryOptions;
            foreach ($specOptions as $option) {
                if (empty($categorySpecOptions->firstWhere('id', $option)))
                    return false;
            }

            $productSpecOptionData[$index]['option'] = $specData['option'];
            $productSpecData['has_multiple_option'] = $categorySpec->has_multiple_option;

            array_push($productSpecsData, $productSpecData);
            $index++;
        }
        $insertedProductSpec = $productSpecs->insertData($productSpecsData);
        if (empty($insertedProductSpec))
            return false;
        $productSpecsData = $productSpecs->getData(['product_id' => $productId], [], ['*'], 'ASC');
        $index = 0;
        $productSpecsOptions = array();
        $productSpecsOption['created_at'] = Carbon::now();
        foreach ($productSpecsData as $productSpec) {
            $productSpecsOption['product_spec_id'] = $productSpec->id;
            foreach ($productSpecOptionData[$index]['option'] as $productSpecDatum) {
                $productSpecsOption['category_option_id'] = $productSpecDatum;
                array_push($productSpecsOptions, $productSpecsOption);
            }
            $index++;
        }
        $productOptions = new ProductOption();
        $insertedProductSpecOption = $productOptions->insertData($productSpecsOptions);
        if (empty($insertedProductSpecOption))
            return false;
        return true;
    }

    public function showProduct($id)
    {
        $product = $this->product->findProduct($id);
        return view('product.show-product', compact('product'));
    }

    public function viewStore($id)
    {

        $products = $this->product->getUserStoreProducts($id);

        return view('product.view_store', compact('products'));
    }

    public function delete(Request $request, $id, Favorite $favorite, Cart $cart)
    {

        $product = $this->product->getData(['user_id' => $request->user()->id, 'id' => $id]);
        if (empty($product))
            return back();
        DB::beginTransaction();
        $this->product->softDeleteData(['id' => $id]);
        $favorite->where(['product_id' => $id])->delete();
        $cart->where(['product_id' => $id])->delete();
        DB::commit();
        return redirect()->route('home');
    }
}
