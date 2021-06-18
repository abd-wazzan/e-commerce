<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories()
    {
        $categories = $this->category->where('category_id', '=', null)->with('categories')->get();
        return view('category.choose-category', compact('categories'));
    }

    public function getCategorySpecs($id)
    {
        $category = $this->category->where('id', $id)->with(['categorySpecs' => function($spec){
            $spec->with('categoryOptions');
        }])->first();
        if(empty($category->category_id))
        return back();
        return view('product.add', compact('category', 'id'));
    }
}
