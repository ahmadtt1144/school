<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Shoes Stop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Your custom CSS -->
</head>
<body>

     <!-- Navbar -->
     @include('pages.nav')

     <section id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="images/Frame 1.png" class="d-block w-100 img-fluid" alt="Banner 1">
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="images/Frame 4.png" class="d-block w-100 img-fluid" alt="Banner 2">
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="images/Frame 5.png" class="d-block w-100 img-fluid" alt="Banner 3">
        </div>
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>





<!-- Featured Products Section -->
<section class="featured-products py-5">
    <div class="container">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row g-4"> 
            @foreach($featuredProducts as $product)
                <div class="col-6 col-md-4 col-lg-3 d-flex align-items-stretch"> 
                    <div class="card mb-4 product-card">
                        <div class="product-image-container">
                            <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                           
                            <p><strong>Price: Rs:{{ $product->price }}</strong></p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary mt-auto">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('Footer.main')


<!-- Custom CSS -->
<style>
    /* Product Card Adjustments */
    .product-card {
        width: 100%; 
        height: 100%; 
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.2s ease;
    }

    /* Add hover effect */
    .product-card:hover {
        transform: translateY(-5px);
    }

    /* Image Container with fixed dimensions */
    .product-image-container {
        height: 250px; 
        width: 100%; 
        overflow: hidden; 
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Ensure the image covers the container without distortion */
    .product-image {
        object-fit: cover; 
        height: 100%; 
        width: 100%; 
    }

    /* Adjust spacing between products in rows */
    .row.g-4 > [class*='col-'] {
        margin-bottom: 20px; 
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .product-image-container {
            height: 200px; 
        }
    }

    @media (max-width: 576px) {
        .product-image-container {
            height: 180px; 
        }
        /* Ensure 2 products per row on extra small screens */
        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

 /* Custom CSS for Carousel */
.carousel-inner img {
    width: 100%; 
    height: auto; 
    max-height: 300px; 
    object-fit: cover; 
}

/* Responsive adjustments for smaller screens */
@media (max-width: 500px) {
    .carousel-inner img {
        max-height: 200px; 
    }
}

@media (min-width: 501px) and (max-width: 768px) {
    .carousel-inner img {
        max-height: 250px; 
    }
}

/* Adjustments for tablets (768px - 1024px) */
@media (min-width: 768px) and (max-width: 1024px) {
    .carousel-inner img {
        max-height: 350px; 
        width: 100vw; 
        height: auto; 
        object-fit: cover; 
    }
}

/* Adjustments for larger screens (1024px - 1200px) */
@media (min-width: 1024px) and (max-width: 1200px) {
    .carousel-inner img {
        max-height: 550px; 
        object-fit: cover;
    }
}

/* Adjustments for extra-large screens (above 1200px) */
@media (min-width: 1200px) {
    .carousel-inner img {
        max-height: 650px; 
        object-fit: cover;
    }
}






</style>



<!-- Footer Section
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>&copy; 2024 Shoes Stop. All rights reserved.</p>
    </div>
</footer> -->

<!-- Bootstrap JS and custom JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
