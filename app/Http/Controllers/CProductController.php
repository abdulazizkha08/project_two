<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\ProductHelper;
use Illuminate\Http\Request;

class CProductController extends Controller
{
    public function show(Product $product)
    {
        $prices = collect([$product->price]);
        $formattedPrices = ProductHelper::formatPrices($prices);

        return view('buyer.products.index', compact('product', 'formattedPrices'));
    }
}
