<?php

namespace App\Services\Implementations\PriceCalculatorStrategy;

use App\Services\Contracts\PriceCalculatorStrategy;

class BasicStrategy implements PriceCalculatorStrategy
{
    public function calculate(int $price, int $percent = 0): int
    {
        return $price;
    }
}
