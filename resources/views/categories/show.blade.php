<!-- resources/views/category/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Products</title>
</head>
<body>
    <h1>{{ $category->name }}</h1>
    <p>Browse all products under the {{ $category->name }} category.</p>
    
    <!-- Loop through products in this category -->
    @if($category->products->count() > 0)
        <ul>
            @foreach($category->products as $product)
                <li>{{ $product->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No products available in this category.</p>
    @endif
</body>
</html>
