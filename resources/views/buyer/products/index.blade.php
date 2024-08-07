<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overview') }}
        </h2>
    </x-slot>

    <body>
    <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-3 overview-width">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <!-- Display Product Image-->
                        @if($product->images->isNotEmpty())
                            <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}">
                        @else
                            <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="...">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="small mb-1">{{ $product->user->name }}</div>
                        <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                        <div class="fs-5 mb-5">
                            @foreach($formattedPrices as $price)
                            <span class="text-decoration-line-through">{{ $price }} UZS</span>
                            <span>{{ $price }} UZS</span>
                            @endforeach
                        </div>
                        <p class="lead">{{ $product->description }}</p>
                        <!-- Add to Cart Button -->
{{--                        <div class="d-flex">--}}
{{--                            <form action="{{ route('cart.add') }}" method="POST" class="d-flex">--}}
{{--                                @csrf--}}
{{--                                <input type="number" name="quantity" value="1" min="1" class="form-control text-center me-3" style="max-width: 3rem">--}}
{{--                                <button type="submit" class="btn btn-outline-dark flex-shrink-0" id="add-to-cart-button"><i class="bi-cart-fill me-1"></i>Add to Cart</button>--}}
{{--                                <input type="hidden" name="product[id]" value="{{ $product->id }}">--}}
{{--                                <input type="hidden" name="product[name]" value="{{ $product->name }}">--}}
{{--                                <input type="hidden" name="product[description]" value="{{ $product->description }}">--}}
{{--                                <input type="hidden" name="product[price]" value="{{ $product->price }}">--}}
{{--                            </form>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
{{--        <section class="py-5 bg-light">--}}
{{--            <div class="container px-4 px-lg-5 mt-5">--}}
{{--                <h2 class="fw-bolder mb-4">Related products</h2>--}}
{{--                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">--}}
{{--                    <div class="col mb-5">--}}
{{--                        <div class="card h-100">--}}
{{--                            <!-- Product image-->--}}
{{--                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                            <!-- Product details-->--}}
{{--                            <div class="card-body p-4">--}}
{{--                                <div class="text-center">--}}
{{--                                    <!-- Product name-->--}}
{{--                                    <h5 class="fw-bolder">Fancy Product</h5>--}}
{{--                                    <!-- Product price-->--}}
{{--                                    $40.00 - $80.00--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Product actions-->--}}
{{--                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col mb-5">--}}
{{--                        <div class="card h-100">--}}
{{--                            <!-- Sale badge-->--}}
{{--                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>--}}
{{--                            <!-- Product image-->--}}
{{--                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                            <!-- Product details-->--}}
{{--                            <div class="card-body p-4">--}}
{{--                                <div class="text-center">--}}
{{--                                    <!-- Product name-->--}}
{{--                                    <h5 class="fw-bolder">Special Item</h5>--}}
{{--                                    <!-- Product reviews-->--}}
{{--                                    <div class="d-flex justify-content-center small text-warning mb-2">--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                    </div>--}}
{{--                                    <!-- Product price-->--}}
{{--                                    <span class="text-muted text-decoration-line-through">$20.00</span>--}}
{{--                                    $18.00--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Product actions-->--}}
{{--                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col mb-5">--}}
{{--                        <div class="card h-100">--}}
{{--                            <!-- Sale badge-->--}}
{{--                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>--}}
{{--                            <!-- Product image-->--}}
{{--                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                            <!-- Product details-->--}}
{{--                            <div class="card-body p-4">--}}
{{--                                <div class="text-center">--}}
{{--                                    <!-- Product name-->--}}
{{--                                    <h5 class="fw-bolder">Sale Item</h5>--}}
{{--                                    <!-- Product price-->--}}
{{--                                    <span class="text-muted text-decoration-line-through">$50.00</span>--}}
{{--                                    $25.00--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Product actions-->--}}
{{--                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col mb-5">--}}
{{--                        <div class="card h-100">--}}
{{--                            <!-- Product image-->--}}
{{--                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                            <!-- Product details-->--}}
{{--                            <div class="card-body p-4">--}}
{{--                                <div class="text-center">--}}
{{--                                    <!-- Product name-->--}}
{{--                                    <h5 class="fw-bolder">Popular Item</h5>--}}
{{--                                    <!-- Product reviews-->--}}
{{--                                    <div class="d-flex justify-content-center small text-warning mb-2">--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                        <div class="bi-star-fill"></div>--}}
{{--                                    </div>--}}
{{--                                    <!-- Product price-->--}}
{{--                                    $40.00--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Product actions-->--}}
{{--                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- Footer-->
        <footer class="bg-dark footer-c-style">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</x-app-layout>
