<!-- resources/views/Footer/about.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Shoes Stop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Your custom CSS -->
</head>
<body>

    <!-- Navbar -->
    @include('pages.nav')

    <!-- About Us Section -->
    <section class="about-us-section py-5">
        <div class="container">
            <div class="about">
            <h1 class="text-center mb-4">About Us</h1>
            </div>
            <p class="text-center">Welcome to <strong>Shoes Stop</strong>, your ultimate destination for high-quality, stylish, and affordable footwear. At Shoes Stop, we believe that shoes are more than just accessories—they are an expression of who you are. That's why we bring you a wide range of footwear options that cater to every need, occasion, and style.</p>

            <p class="text-center">Since our inception, we have committed to providing an unmatched shopping experience for every shoe enthusiast. Whether you're looking for formal shoes, casual wear, or athletic footwear, we have meticulously curated collections to ensure we meet all your fashion and comfort needs.</p>

            <h2 class="text-center mt-5 mb-4">What We Offer</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <strong>Women’s Footwear:</strong> From elegant heels and flats to durable boots and sandals, our women’s collection is designed to keep you stylish and comfortable all day long.</li>
                <li class="list-group-item"> <strong>Men’s Footwear:</strong> Explore a wide variety of men’s shoes, ranging from formal dress shoes to casual sneakers and sandals, crafted to meet high standards of quality and comfort.</li>
                <li class="list-group-item"> <strong>Sale Items:</strong> Discover great deals and discounts on select shoes. Our sale section offers premium quality at affordable prices, ensuring you don’t have to compromise on style or comfort.</li>
                <li class="list-group-item"> <strong>Bags & Accessories:</strong> Complement your footwear with our carefully selected bags and accessories to complete your outfit.</li>
                <li class="list-group-item"> <strong>Pret & Cosmetics:</strong> In addition to shoes, we also offer a collection of pret wear and cosmetics to elevate your style beyond just footwear.</li>
            </ul>

            <h2 class="text-center mt-5 mb-4">Why Choose Shoes Stop?</h2>
            <p class="text-center">At <strong>Shoes Stop</strong>, we understand the importance of both quality and design. That’s why every product in our store is sourced from trusted brands and undergoes rigorous quality checks to ensure they meet your expectations. Whether you’re shopping for everyday use or a special occasion, you can count on us to deliver not just shoes, but footwear that enhances your lifestyle.</p>

            <p class="text-center">Thank you for choosing Shoes Stop—where style meets substance.</p>
        </div>
    </section>

    <!-- Footer -->
    @include('Footer.main')

    <!-- Bootstrap JS and custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<style>
    .about{
        background-color:grey;
        color:white;
    }
</style>
