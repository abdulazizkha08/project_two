<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Bazar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Image;

class ProductController extends Controller
{

    public function myProducts()
    {
        $user = Auth::user();
        $products = $user->products; // Fetch products related to the logged-in user
        $prices = $products->pluck('price');
        $formattedPrices = ProductHelper::formatPrices($prices);

        return view('myproducts', compact('user', 'products', 'formattedPrices'));
    }

    public function create()
    {
        $user = auth()->user(); // Get the currently authenticated user
        $bazar = $user->bazar;  // Get the bazar associated with the user

        $userId = auth()->id(); // Get the authenticated user ID

        return view('seller.products.create', compact('bazar', 'userId'));
    }

    public function store(Request $request)
    {
//        dd($request->all()); // This will dump the request data and stop execution

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);


        // If validation passes, add a debug statement here
//        dd('Validation passed');

        \Log::info('Product Data:', $validated); // Log the validated data

        $product = Product::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/products');
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => str_replace('public/', '', $path),
                ]);
            }
        }

        return redirect()->route('my.products')->with('success', 'Product added successfully.');
    }



    public function show(Product $product)
    {
        $prices = collect([$product->price]);
        $formattedPrices = ProductHelper::formatPrices($prices);

        return view('buyer.products.index', compact('product', 'formattedPrices'));
    }

    public function edit(Product $product)
    {
        $bazars = Bazar::all();
        $selectedBazar = $bazars->firstWhere('id', $product->bazar_id);
        $formattedPrice = ProductHelper::formatPrices(collect([$product->price]))->first();

        return view('seller.products.edit', compact('product', 'bazars', 'formattedPrice', 'selectedBazar'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $product->fill($request->all());

        if ($request->hasFile('image')) {
            $product->image = $this->handleImageUpload($request->file('image'));
        }

        $product->save();

        // Format the price before displaying
        $formattedPrice = ProductHelper::formatPrices(collect([$product->price]))->first();

        return redirect()->route('my.products')->with('success', 'Product updated successfully.')->with('formattedPrice', $formattedPrice);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('my.products')->with('success', 'Product deleted successfully.');
    }

    public function getUserProducts(User $user)
    {
        $products = $user->products;
        $prices = $products->pluck('price');
        $formattedPrices = ProductHelper::formatPrices($prices);
        return view('shop', compact('user', 'products', 'formattedPrices'));
    }

    private function handleImageUpload($image)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = storage_path('app/public/products' . $filename);

        // Resize and save the image
        Image::make($image)->resize(600, 700, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);

        return 'products/' . $filename;
    }
}
