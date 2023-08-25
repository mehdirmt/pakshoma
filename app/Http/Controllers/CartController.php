<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToCartRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(AddProductToCartRequest $request): JsonResponse
    {
        $productId = $request->input('product_id');
        Product::findOrFail($productId);

        if (!in_array($productId, Session::get('cart', []))) {
            Session::push('cart', $productId);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'add to cart success ' . $productId
        ]);
    }
}
