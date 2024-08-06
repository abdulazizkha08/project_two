<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}.Products
        </h2>
    </x-slot>

    <!-- Section-->
    <section class="py-3">
        <div class="container px-4 px-lg-5 market-width">
            <!-- Search panel -->
            <div class="input-group mb-3">
                <a type="button" class="btn btn-warning btn-market" href="{{ route('products.create') }}">
                    <span class="fa fa-plus-square"></span> Add Product
                </a>
                <input type="text" class="form-control" placeholder="Search items here">
                <button class="btn btn-outline-primary btn-search" type="button">Search</button>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-6 justify-content-center">
                @if($products->isEmpty())
                    <p>No products found.</p>
                @else
                    @foreach($products as $index => $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            @if($product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}" class="card-img-top mb-5 mb-md-0">
                            @else
                                <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="...">
                            @endif
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <!-- Product price-->
                                    {{ $formattedPrices[$index] }} UZS
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('products.edit', $product) }}">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

</x-app-layout>
