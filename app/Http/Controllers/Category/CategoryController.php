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

    public function getCategories($id)
    {
        return ResponseHelper::select($this->category->getData(['category_id'=>$id]));
    }

    public function getCategorySpecs($id)
    {
        $category = $this->category->where('id', $id)->with(['categorySpecs' => function($spec){
            $spec->with('categoryOptions');
        }])->first();
        if(empty($category->category_id))
        return back();
        return view('product.add', compact('category'));
    }
}
