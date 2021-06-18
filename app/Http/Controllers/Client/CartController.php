<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Cart;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class CartController extends Controller
{
    protected $product;
    protected $cart;

    public function __construct(Product $product, Cart $cart)
    {
        $this->product = $product;
        $this->cart = $cart;
    }

    public function toggle(Request $request, $productId)
    {
        $data = ['user_id' => $request->user()->id, 'product_id' => $productId];
        $cart = $this->cart->findData($data);
        if(!empty($cart))
        return ResponseHelper::delete($this->cart->forceDeleteData($data));
        return ResponseHelper::insert($this->cart->createData($data));
    }
}
