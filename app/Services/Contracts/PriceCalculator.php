<?php

namespace App\Services\Contracts;

interface PriceCalculator
{
    public function calculate(int $price, int $percent);
}
