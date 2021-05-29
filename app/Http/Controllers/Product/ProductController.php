<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Category\Category;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

/** this is controller for Product */
class ProductController extends Controller
{
    protected $product;

    public function __construct( Category $category , Product $Product)
    {
        $this->product = $Product;
    }

    public function create( Request $request)
    {
        $user = $request->user();
        $product = $request->get('id', 0);
        $products = $this->product->getData(['id' => null],['products']);
        $categories = $this->category->getdata(['category_id' => null],['categories']);
        //$products = $this->product->getData([], [], ['*'], 'DESC', 'id', 10);
        return view('product.index', compact('categories', 'products', 'id', 'categoryId'));


        //$dataProduct = $request->only($this->property->getFillable());
       /* $dataProperty['user_id'] = $user->id;


        DB::beginTransaction();
        $createdProperty = $this->property->createData($dataProperty);
        if (empty($createdProperty)) {
            DB::rollBack();
            return ResponseHelper::generalError();
        }
        $propertyId = $createdProperty->id;
        $images = ($request->has('images')) ? $request->get('images') : [];
        $imagesStatues = $this->insertImages($images, $propertyId);
        if (empty($imagesStatues)) {
            DB::rollBack();
            return ResponseHelper::generalError();
        }
        $propertySpecStatus = $this->insertPropertySpecs(collect($request->get('specs'))->toCollection()
            , $propertyId, $createdProperty->type_id);
        if (empty($propertySpecStatus)) {
            DB::rollBack();
            return ResponseHelper::generalError();
        }
        DB::commit();
        return ResponseHelper::insert(); */












    }
}
