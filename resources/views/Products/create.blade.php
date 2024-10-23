<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

@extends('layouts.app')
@section('title', 'Add Product')

@section('content')

<div class="container mt-5">
    <!-- Buttons for Back and Go to Dashboard -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-between">
            <!-- Back button -->
            <!-- <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a> -->
            
            
        </div>
    </div>

    <!-- Form for Adding Product -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center text-bg-primary">
                    <h2>Add New Product</h2>
                </div>
                <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="product-name" class="form-label">Product Name</label>
                            <input value="{{ old('name') }}" type="text" class=" @error('name') is-invalid @enderror form-control" id="product-name" name="name" placeholder="Enter Product Name" required>
                            @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        

                        <!-- Product Model -->
                        <div class="mb-3">
                            <label for="product-model" class="form-label">Product Model</label>
                            <input value="{{ old('model') }}" type="text" class="@error('model') is-invalid @enderror form-control" id="product-model" name="model" placeholder="Enter Product Model" required>
                            @error('model')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Price -->
                        <div class="mb-3">
                            <label for="product-price" class="form-label">Product Price</label>
                            <input value="{{ old('price') }}" type="number" class="@error('price') is-invalid @enderror form-control" id="product-price" name="price" placeholder="Enter Product Price" required>
                            @error('price')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category Dropdown -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Subcategory Dropdown -->
                        <div class="mb-3">
                            <label for="subcategory_id" class="form-label">Subcategory</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                                <option value="">Select Subcategory</option>
                            </select>
                            @error('subcategory_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Images -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input value="{{ old('image') }}" type="file" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*" name="image">
                            @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Enter Product Description" required>{{ old('description') }}</textarea>
                            @error('description')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- jQuery to handle subcategory change -->
<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: "{{ route('getSubcategories') }}",
                    type: "GET",
                    data: { category_id: categoryId },
                    success: function(data) {
                        $('#subcategory_id').html(data);
                    }
                });
            } else {
                $('#subcategory_id').html('<option value="">Select Subcategory</option>');
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
