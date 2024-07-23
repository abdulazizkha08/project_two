<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function index()
    {

        $users = User::all();
        $products = Products::when(request('product_id'), function ($query) {
            $query->where('product_id', request('product_id'));
        })->latest()->get();

        return view('market', compact('users', 'products'));
    }
}
