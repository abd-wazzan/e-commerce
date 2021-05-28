<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $category;
    protected $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $categoryId = $request->get('cat', 0);
        $subCategoryId = $request->get('sub',0);
        $categories = $this->category->getData(['category_id' => null],['categories']);
        $subCategories = (bool)$categoryId ? $this->category->getData(['category_id' => $categoryId],['categorySpecs' => function($categorySpecs)
        {
            return $categorySpecs->with('categoryOptions');
        }]) : [];

        $products = $this->product->getData(['category_id' => $categoryId],['productSpecs' => function($productSpecs)
        {
            return $productSpecs->with('productOptions');
        }], ['*'], 'DESC', 'id', 15);

        return view('product.index', compact('categories', 'products', 'subCategories', 'categoryId'));
    }
}
