<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Product
        </h2>
    </x-slot>

    <!-- Product section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-3 overview-width">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-6">
                    <!-- Display Product Image Placeholder -->
                    <img class="card-img-top mb-5 mb-md-0 image-c-height" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="Product Image">
                </div>
                <div class="col-md-6">
                    <!-- Create Form -->
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Bazar Selection -->
                        <div class="mb-3">
                            <label for="bazar" class="form-label">Bazar</label>
                            <select id="bazar" name="bazar_id" class="form-select no-arrow" disabled>
                                @foreach($bazars as $bazar)
                                    <option value="{{ $bazar->id }}">{{ $bazar->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <!-- Product Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (UZS)</label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                        </div>

                        <!-- Product Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <!-- Product Images -->
                        <div class="mb-3">
                            <label for="images" class="form-label">Images</label>
                            <input type="file" id="images" name="images[]" class="form-control" multiple>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
