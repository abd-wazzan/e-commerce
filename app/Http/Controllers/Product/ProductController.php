<?php

namespace App\Http\Controllers\Product;

use App\Helpers\FileClass;
use App\Helpers\StringConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Product\StoreProductRequest;
use App\Models\Product\Product;
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
        try{
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
        DB::commit();
        return ResponseHelper::select($product);
    }
    catch(\Exception $ex){
        return ResponseHelper::operationFail($productData);
    }
        return ResponseHelper::select($product);
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
}
