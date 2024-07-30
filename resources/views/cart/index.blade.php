<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart.blade') }}
        </h2>
    </x-slot>


    <!-- Section-->
    <section class="py-5">
        <div class="container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Shopping Cart</h2>
            @if(session('cart'))
                <table class="table">
                    <thead>
                    <tr>
                        <th>Products</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right px-4">Price</th>
                        <th class="text-right px-4">Total</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(session('cart') as $id => $item)
                        @php
                            $product = $item['product'];
                            $price = $product['price'];
                            $quantity = $item['quantity'];
                            $totalPrice = $price * $quantity;
                            $formattedPrice = \App\Helpers\ProductHelper::formatPrices(collect([$price]))->first();
                            $formattedTotalPrice = \App\Helpers\ProductHelper::formatPrices(collect([$totalPrice]))->first();
                        @endphp
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td class="text-right px-4">{{ $quantity }}</td>
                            <td class="text-right">{{ $formattedPrice }} UZS</td>
                            <td class="text-right">{{ $formattedTotalPrice }} UZS</td>
                            <td class="text-center">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                    <strong>Total: {{ \App\Helpers\ProductHelper::formatPrices(collect([array_reduce(session('cart'), function($carry, $item) {
                        return $carry + ($item['product']['price'] * $item['quantity']);
                    }, 0)]))->first() }} UZS</strong>
                </div>
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
{{--        <div class="container px-4 px-lg-5 market-width">--}}
{{--            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-6 justify-content-center">--}}
{{--                @foreach($products as $product)--}}
{{--                    <div class="col mb-5">--}}
{{--                        <div class="card h-100">--}}
{{--                            <!-- Product image-->--}}
{{--                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                            <!-- Product details-->--}}
{{--                            <div class="card-body p-4">--}}
{{--                                <div class="text-center">--}}
{{--                                    <!-- Product name-->--}}
{{--                                    <h5 class="fw-bolder">{{ $product->name }}</h5>--}}
{{--                                    <!-- Product price-->--}}
{{--                                    {{ $product->price }} UZS--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <!-- Seller name -->--}}
{{--                                    <a href="">{{ $product->user->name }}</a>  --}}{{--href="{{ route('overview', $user) }}"--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Product actions-->--}}
{{--                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('cart.remove', $product) }}">Remove</a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>
    <!-- Footer-->
    <footer class="bg-dark footer-c-style">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>

</x-app-layout>
