<?php

namespace App\Http\Controllers;


use App\Helpers\ProductHelper;
use App\Models\Bazar;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class BazarController extends Controller
{

    public function getBazarProducts(Bazar $bazar)
    {
        $bazars = Bazar::all();
        $users = $bazar->users()->with('products')->get();
        $products = Product::when(request('product_id'), function ($query) {
            $query->where('product_id', request('product_id'));
        })->latest()->get();

        // Collect all prices from the products
        $prices = $products->pluck('price');

        // Format the prices using the helper class
        $formattedPrices = ProductHelper::formatPrices($prices);

        return view('bazar', compact('users','bazar', 'bazars', 'formattedPrices'));
    }

//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//
//        return view('bazar.index');
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Bazar $bazar)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Bazar $bazar)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, Bazar $bazar)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Bazar $bazar)
//    {
//        //
//    }
}
