<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('products.index', compact('product'));
    }

    public function getUserProducts(User $user)
    {
        $products = $user->products;
        return view('shop', compact('user', 'products'));
    }
}
