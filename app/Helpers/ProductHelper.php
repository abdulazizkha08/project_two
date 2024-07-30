<?php

namespace App\Helpers;

class ProductHelper
{
    public static function formatPrices($prices, $decimals = 2)
    {
        return $prices->map(function ($price) use ($decimals) {
            return number_format($price / 100, $decimals, '.', ' ');
        });
    }
}
