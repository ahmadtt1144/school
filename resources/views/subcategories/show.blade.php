<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subcategory->name }} - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Product Card Styling */
        .product-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .product-card img {
            object-fit: cover;
            height: 270px; /* Set height for larger screens */
        }
        .product-card .card-body {
            flex-grow: 1;
        }

        /* Responsive Card Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Set two products per row by default */
            gap: 1.5rem;
        }

        /* Adjustments for larger screens */
        @media (min-width: 769px) {
            .product-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive for larger screens */
            }
            .product-card img {
                height: 270px; /* Maintain height for larger screens */
            }
        }

        /* Adjustments for smaller devices */
        @media (max-width: 768px) {
            .product-card img {
                height: 150px; /* Adjust image height for smaller screens */
            }
        }

        /* Footer styling */
        footer {
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Navbar -->
@include('pages.nav')

<!-- Subcategory Products Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">{{ $subcategory->name }} Products</h2>
        
        <div class="product-grid">
            @foreach($products as $product)
                <div class="card product-card">
                    <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p><strong>Price: Rs:{{ $product->price }}</strong></p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>&copy; 2024 Shoes Stop. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
