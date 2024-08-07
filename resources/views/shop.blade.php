<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}.shop.blade
        </h2>
    </x-slot>


    <!-- Header-->
{{--    <header class="bg-dark header-c-style">--}}
{{--        <div class="container px-4 px-lg-5 my-3">--}}
{{--            <div class="text-center text-white">--}}
{{--                <h1 class="display-4 fw-bolder">Shop in style</h1>--}}
{{--                <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
    <!-- Section-->
    <section class="py-3">
        <div class="container px-4 px-lg-5 market-width">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search items here">
                <button class="btn btn-outline-primary btn-search" type="button">Search</button>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-6 justify-content-center">
               @foreach($products as $index => $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <!-- Product price-->
                                    {{ $formattedPrices[$index] }} UZS
                                </div>
                                <div class="text-center">
                                    <!-- Seller name -->
                                    <a href="">{{ $product->user->name }}</a>  {{--href="{{ route('overview', $user) }}"--}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('product.overview', $product) }}">Overview</a></div>
                            </div>
                        </div>
                    </div>
               @endforeach
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
{{--                                    <span class="text-muted text-decoration-line-through">20.00 UZS</span>--}}
{{--                                    18.00 UZS--}}
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
{{--                                    <span class="text-muted text-decoration-line-through">50.00 UZS</span>--}}
{{--                                    25.00 UZS--}}
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
{{--                                    40.00 UZS--}}
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
{{--                                    <span class="text-muted text-decoration-line-through">50.00 UZS</span>--}}
{{--                                    25.00 UZS--}}
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
{{--                                    <h5 class="fw-bolder">Fancy Product</h5>--}}
{{--                                    <!-- Product price-->--}}
{{--                                    120.00 UZS - 280.00 UZS--}}
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
{{--                                    <span class="text-muted text-decoration-line-through">20.00 UZS</span>--}}
{{--                                    18.00 UZS--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Product actions-->--}}
{{--                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col mb-5">--}}
{{--                    <div class="card h-100">--}}
{{--                        <!-- Product image-->--}}
{{--                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />--}}
{{--                        <!-- Product details-->--}}
{{--                        <div class="card-body p-4">--}}
{{--                            <div class="text-center">--}}
{{--                                <!-- Product name-->--}}
{{--                                <h5 class="fw-bolder">Popular Item</h5>--}}
{{--                                <!-- Product reviews-->--}}
{{--                                <div class="d-flex justify-content-center small text-warning mb-2">--}}
{{--                                    <div class="bi-star-fill"></div>--}}
{{--                                    <div class="bi-star-fill"></div>--}}
{{--                                    <div class="bi-star-fill"></div>--}}
{{--                                    <div class="bi-star-fill"></div>--}}
{{--                                    <div class="bi-star-fill"></div>--}}
{{--                                </div>--}}
{{--                                <!-- Product price-->--}}
{{--                                40.00 UZS--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Product actions-->--}}
{{--                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">--}}
{{--                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-dark footer-c-style">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>

</x-app-layout>
