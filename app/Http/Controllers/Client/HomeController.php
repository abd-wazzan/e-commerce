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
        $categoryId = $request->get('category_id', 0);
        $categories = $this->category->getData(['category_id' => null],['categories']);
        $subCategories = (bool)$categoryId ? $this->category->getData(['category_id' => $categoryId]) : [];
        $products = $this->product->getData([], [], ['*'], 'DESC', 'id', 10);
        return view('product.index', compact('categories', 'products', 'subCategories', 'categoryId'));
    }
}
