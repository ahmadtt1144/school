<!-- Footer for mobile and tablet screens only -->
<footer class="mobile-footer fixed-bottom bg-light d-block">
    <div class="container">
        <div class="row text-center">
            <!-- Wishlist Link -->
            <div class="col-4">
                <a href="{{ route('wishlist') }}" class="text-dark">
                    <i class="fa-regular fa-heart"></i><br>
                    <span>Wishlist</span>
                </a>
            </div>
            <!-- Cart Link -->
            <div class="col-4">
                <a href="{{ route('cart.index') }}" class="text-dark">  <!-- Updated here -->
                    <i class="fa-solid fa-cart-shopping"></i><br>
                    <span>Cart</span>
                </a>
            </div>
            <!-- Account Link -->
            <div class="col-4">
                <a href="{{ route('register') }}" class="text-dark">
                    <i class="fa-solid fa-user"></i><br>
                    <span>Account</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- CSS and CDN links -->

<!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLR3zd6WFlfxlAAx5o5B9ztLr3ea4F60zflbblZ8ox" crossorigin="anonymous">

<!-- FontAwesome for Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Your Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
