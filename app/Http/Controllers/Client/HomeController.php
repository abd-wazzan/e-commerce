<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\GetProductsRequest;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class HomeController extends Controller
{
    protected $category;
    protected $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index(GetProductsRequest $request)
    {
        $params = $request->validated();
        $categoryId = $request->get('cat', 0);
        $subCategoryId = $request->get('sub', 0);
        $minPrice = $request->get('min_price', 0);
        $maxPrice = $request->get('max_price', 999999999);
        $info = $request->get('info');
        $filter = $request->get('filter', []);

        $categories = $this->category->getData(['category_id' => null], ['categories'], ['*'], 'ASC');

        $subCategories = !!$categoryId ? $this->category->getData(['category_id' => $categoryId], ['categorySpecs' => function ($categorySpecs) {
            return $categorySpecs->with('categoryOptions');
        }]) : [];

        $products = $this->product->filterProducts($subCategoryId ? $subCategoryId : $categoryId, $minPrice, $maxPrice, $info, $filter);

        return view('product.index', compact('params', 'categories', 'subCategories', 'products'));
    }
}
