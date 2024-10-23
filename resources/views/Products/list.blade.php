<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .action-buttons {
            display: flex;
            gap: 10px; 
        }
        .card {
            width: 100%; 
        }
        .table th, .table td {
            vertical-align: middle; 
        }
        .image-column img {
            width: 50px;
            height: 50px;
            object-fit: cover; 
        }
    </style>
</head>
<body>
@extends('layouts.app')
@section('title', 'Products List')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('products.create') }}" class="btn btn-dark">Create</a>
        </div>
    </div>

    <div class="row justify-content-center">
        @if (Session::has('success'))
        <div class="col-md-10 mt-4">
            <div class="alert alert-success">
                {{ (Session::get('success')) }}
            </div>
        </div>
        @endif

        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center text-bg-primary">
                    <h2>Products</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Subcategory</th> 
                                <th>Model</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Action</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($products->isNotEmpty())
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>

                                
                                <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>

                                
                                <td>{{ $product->subcategory ? $product->subcategory->name : 'N/A' }}</td>

                                <td>{{ $product->model }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M,Y') }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" onclick="deleteProduct({{ $product->id }});" class="btn btn-sm btn-danger">Delete</a>
                                    </div>

                                    <form id="delete-product-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td class="image-column">
                                    @if ($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image">
                                    @else
                                        No image
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function deleteProduct(id) {
        if (confirm("Are you sure you want to delete this product?")) {
            document.getElementById("delete-product-form-" + id).submit();
        }
    }
</script>

</body>
</html>
