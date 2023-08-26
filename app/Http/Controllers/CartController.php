<?php

namespace App\Http\Controllers;

use App\Enums\PlanTypes;
use App\Http\Requests\AddProductToCartRequest;
use App\Http\Requests\CalcTotalPriceRequest;
use App\Models\Product;
use App\Models\SellType;
use App\Services\Implementations\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    )
    {}

    public function index(): View
    {
        $productsIds = Session::get('cart', []);

        $products = Product::whereIn('id', $productsIds)->get();

        return view('cart', [
            'products'  => $products,
            'planTypes' => PlanTypes::cases(),
            'sell_types'=> SellType::with('plans')->get()
        ]);
    }

    public function addToCart(AddProductToCartRequest $request): JsonResponse
    {
        $productId = $request->input('product_id');

        // check if product exist
        Product::findOrFail($productId);

        if (!in_array($productId, Session::get('cart', []))) {
            Session::push('cart', $productId);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'add to cart success ' . $productId
        ]);
    }

    public function calcTotalPrice(CalcTotalPriceRequest $request)
    {
        $validated = $request->validated();

        $totalSellPrice = $this->cartService->calcTotalPrice($validated['products'], $validated['plan']);

        return response()->json([
            'status'  => 'success',
            'message' => 'calc cart price',
            'data'    => [
                'total_price' => $totalSellPrice
            ]
        ]);
    }
}
