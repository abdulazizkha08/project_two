<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = $request->input('product');
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);
        if (isset($cart[$product['id']])) {
            $cart[$product['id']]['quantity'] += $quantity;
        }
        else{
            $cart[$product['id']] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function count()
    {
        // Assuming your cart is stored in the session
        $cart = session()->get('cart', []);
        $count = array_reduce($cart, function($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);

        Log::info('Cart count requested. Cart:', ['cart' => $cart, 'count' => $count]);

        return response()->json(['count' => $count]);
    }
}
