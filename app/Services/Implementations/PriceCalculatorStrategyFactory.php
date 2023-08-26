<?php

namespace App\Services\Implementations;

use App\Enums\PlanTypes;
use App\Models\Plan;
use App\Services\Contracts\PriceCalculatorStrategy;
use App\Services\Implementations\PriceCalculatorStrategy\BasicStrategy;
use App\Services\Implementations\PriceCalculatorStrategy\CashStrategy;
use App\Services\Implementations\PriceCalculatorStrategy\InstallmentsStrategy;

class PriceCalculatorStrategyFactory
{
    public static function getStrategy(Plan $plan): PriceCalculatorStrategy
    {
        return match ($plan->sellType->code) {
            PlanTypes::CASH->value         => new CashStrategy(),
            PlanTypes::INSTALLMENTS->value => new InstallmentsStrategy(),
            default                        => new BasicStrategy(),
        };
    }
}
