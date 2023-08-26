<?php

namespace App\Services\Contracts;

interface PriceCalculatorStrategy
{
    public function calculate(int $price, int $percent = 0): int;
}
