<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center text-bg-primary">
                    <h2>Edit Product</h2>
                </div>
                <form enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="product-name" class="form-label">Product Name</label>
                            <input value="{{ old('name', $product->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="product-name" name="name" placeholder="Enter Product Name" required>
                            @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Model -->
                        <div class="mb-3">
                            <label for="product-model" class="form-label">Product Model</label>
                            <input value="{{ old('model', $product->model) }}" type="text" class="form-control @error('model') is-invalid @enderror" id="product-model" name="model" placeholder="Enter Product Model" required>
                            @error('model')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Price -->
                        <div class="mb-3">
                            <label for="product-price" class="form-label">Product Price</label>
                            <input value="{{ old('price', $product->price) }}" type="number" class="form-control @error('price') is-invalid @enderror" id="product-price" name="price" placeholder="Enter Product Price" required>
                            @error('price')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Enter Product Description" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Product Image (Display) -->
                        <div class="mb-3">
                            <label for="current-image" class="form-label">Image</label><br>
                            @if ($product->image)
                                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image" style="width: 100px; height: 100px;">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>

                        <!-- Upload New Product Image (Optional) -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload New Image (Optional)</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*" name="image">
                            @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
