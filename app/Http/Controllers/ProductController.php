<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $prices = collect([$product->price]);
        $formattedPrices = ProductHelper::formatPrices($prices);

        return view('buyer.products.index', compact('product', 'formattedPrices'));
    }

    public function getUserProducts(User $user)
    {
        $products = $user->products;
        return view('shop', compact('user', 'products'));
    }
}
