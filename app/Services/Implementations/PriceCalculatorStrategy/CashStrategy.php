<?php

namespace App\Services\Implementations\PriceCalculatorStrategy;

use App\Services\Contracts\PriceCalculatorStrategy as PriceCalculatorStrategyInterface;

class CashStrategy implements PriceCalculatorStrategyInterface
{
    public function calculate(int $price, int $percent = 0): int
    {
        $totalSellPrice = $price - (($price / 100) * $percent);

        return $totalSellPrice;
    }
}
