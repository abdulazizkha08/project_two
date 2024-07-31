<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Nette\Utils\Image;

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

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/products');
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => str_replace('public/', '', $path)
                ]);
            }

            //        $request->validate([
//            'name' => 'required',
//            'price' => 'required',
//            'description' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
//        ]);
//
//        $product = new Product($request->all());
//
//        if ($request->hasFile('image')) {
//            $product->image = $this->handleImageUpload($request->file('image'));
//        }
//
//        $product->save();
//
//        return redirect()->route('products.index')->with('success', 'Product added successfully.');

        }

        return redirect()->route('products.index');

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

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
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
