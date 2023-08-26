<?php

namespace App\Services\Implementations;

use App\Models\Plan;
use App\Services\Contracts\PriceCalculator as PriceCalculatorInterface;
use App\Services\Contracts\PriceCalculatorStrategy;

class PriceCalculator implements PriceCalculatorInterface
{
    protected PriceCalculatorStrategy $strategy;

    public function __construct(PriceCalculatorStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function calculate(int $price, int $percent): int
    {
        return $this->strategy->calculate($price, $percent);
    }
}
