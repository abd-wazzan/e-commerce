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
}
