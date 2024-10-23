<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Search Results</h1>

        @if($products->isEmpty())
            <p>No products found matching your search criteria.</p>
        @else
            <ul>
                @foreach($products as $product)
                    <li>{{ $product->name }} - {{ number_format($product->price, 2) }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
