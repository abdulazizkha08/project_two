<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Bazar;
use App\Helpers\ProductHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function index()
    {
        $bazars = Bazar::all();
        $users = User::all();
        $products = Product::when(request('product_id'), function ($query) {
            $query->where('product_id', request('product_id'));
        })->latest()->get();

        // Collect all prices from the products
        $prices = $products->pluck('price');

        // Format the prices using the helper class
        $formattedPrices = ProductHelper::formatPrices($prices);

        return view('market', compact('users', 'products', 'formattedPrices', 'bazars'));
    }
}
