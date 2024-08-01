<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ $product->name }}
        </h2>
    </x-slot>

    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-3 overview-width">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <!-- Display Product Image-->
                    @if($product->images->isNotEmpty())
                        <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}">
                    @else
                        <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="{{ $product->name }}">
                    @endif
                </div>
                <div class="col-md-6">
                    <!-- Display Product Details -->
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                    <div class="fs-5 mb-5">
                        <span>{{ $formattedPrice }} UZS</span>
                    </div>
                    <p class="lead">{{ $product->description }}</p>

                    <!-- Edit Form -->
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Bazar Selection -->
                        <div class="mb-3">
                            <label for="bazar" class="form-label">Bazar</label>
                            <select id="bazar" name="bazar_id" class="form-select" disabled>
                                @foreach($bazars as $bazar)
                                    <option value="{{ $bazar->id }}" {{ $product->bazar_id == $bazar->id ? 'selected' : '' }}>{{ $bazar->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>

                        <!-- Product Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (UZS)</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>

                        <!-- Product Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
                        </div>

                        <!-- Product Images -->
                        <div class="mb-3">
                            <label for="images" class="form-label">Images</label>
                            <input type="file" id="images" name="images[]" class="form-control" multiple>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
