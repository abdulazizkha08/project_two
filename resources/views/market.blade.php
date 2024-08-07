<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Market.blade') }}
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
            <!-- Search bar -->
            <div class="input-group mb-3">
                <button type="button" class="btn btn-outline-primary btn-market dropdown-toggle" data-bs-toggle="dropdown">
                    Go to Bazar
                </button>
                <ul class="dropdown-menu">
                @foreach($bazars as $bazar)
                    <li><a class="dropdown-item" href="{{ route('bazar.products', $bazar) }}">{{ $bazar->name }}</a></li>
                @endforeach
                </ul>
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
                                    <a href="{{ route('user.products', $product->user->id) }}">{{ $product->user->name }}</a>
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
                   <!-- Scroll to Top Button-->
                <button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fa fa-angle-double-up'></i></button>
            </div>
        </div>
        <script>
            // Get the button:
            let mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }
        </script>
    </section>

</x-app-layout>
