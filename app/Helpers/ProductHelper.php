<?php

namespace App\Helpers;

use App\Models\Product;

class ProductHelper
{
    public static function formatPrices($prices, $decimals = 0)
    {
        return $prices->map(function ($price) use ($decimals) {
            return number_format($price / 100, $decimals, '.', ' ');
        });
    }
}