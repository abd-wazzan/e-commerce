<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function store(Request $request)
    {
        return ResponseHelper::select($request->specs);
    }
}
