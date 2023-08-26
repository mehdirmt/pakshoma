<?php

namespace App\Services\Implementations;

use App\Models\Plan;
use App\Models\Product;

class CartService
{
    public function calcTotalPrice($products, $plan)
    {
        // 1- map plan to real plan
        $plan = Plan::with('sellType')->find($plan);

        // 2- map products (id) to real product
        foreach ($products as $index => $product) {
            $products[$index]['product'] = Product::find($product['product']);
        }

        // 3- calc total_price
        $totalPrice = 0;
        foreach ($products as $p) {
            $totalPrice += ($p['product']->price * $p['quantity']);
        }

        // 4- calc total_sell_price base on plan and total_price
        $priceCalculator = new PriceCalculator(
            PriceCalculatorStrategyFactory::getStrategy($plan)
        );

        return $priceCalculator->calculate($totalPrice, $plan->percent);
    }
}
