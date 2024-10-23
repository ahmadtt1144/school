
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Products in {{ $subcategory->name }}</h2>
        <div class="row">
            @if($products->count() > 0)
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">

                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p><strong>Price: ${{ $product->price }}</strong></p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No products found in this subcategory.</p>
            @endif
        </div>
    </div>
@endsection
