<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Favorite;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class FavoriteController extends Controller
{
    protected $product;
    protected $favorite;

    public function __construct(Product $product, Favorite $favorite)
    {
        $this->product = $product;
        $this->favorite = $favorite;
    }

    public function toggle(Request $request, $productId)
    {
        $data = ['user_id' => $request->user()->id, 'product_id' => $productId];
        $favorite = $this->favorite->findData($data);
        if(!empty($favorite))
        return ResponseHelper::delete($this->favorite->forceDeleteData($data));
        return ResponseHelper::insert($this->favorite->createData($data));
    }
}
