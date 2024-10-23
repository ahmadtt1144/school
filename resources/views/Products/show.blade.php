@include('pages.nav')

<div class="container mt-5">
    <div class="row d-flex align-items-start">
        <!-- Product Image Section (Left Side) -->
        <div class="col-md-6 d-flex justify-content-center">
            <div class="product-image">
                <img src="{{ asset('uploads/products/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="img-fluid product-img"
                     style="width: 100%; max-width: 400px; height: 400px; object-fit: cover;">
            </div>
        </div>

        <!-- Product Details Section (Right Side) -->
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p><strong>Model:</strong> {{ $product->model }}</p>
            <p><strong>Price:</strong> Rs. {{ number_format($product->price) }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>

            <!-- Product Add to Cart Form -->
            <form id="addToCartForm" action="{{ route('cart.store') }}" method="POST" class="d-flex align-items-center mb-3">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" class="form-control w-25 me-2">
                <button type="submit" class="btn btn-dark me-2" id="addToCartButton">Add to Bag</button>
                <!-- <button type="button" class="btn btn-outline-dark">Buy it Now</button> -->
                <a href="{{ route('checkout.index') }}" class="btn btn-outline-dark">Buy it Now</a> 
            </form>
        </div>
    </div>
</div>

<!-- Cart Slider -->
<div id="cartSlider" class="cart-slider">
    <div class="cart-header">
        <h4>Shopping Cart</h4>
        <button class="btn-close" id="closeCartSlider">&times;</button>
    </div>
    <div class="cart-body">
        <div id="cartItems">
            @include('partials.cart-items', ['cartItems' => $cartItems]) <!-- Pass the correct cart items -->
        </div>
        <div class="cart-footer">
            <a href="{{ route('cart.index') }}" class="btn btn-dark">View Cart</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary">Checkout</a>
        </div>
    </div>
</div>


<!-- CSS for the cart slider -->
<style>
    .cart-slider {
        position: fixed;
        right: -400px;
        top: 0;
        width: 400px;
        height: 100%;
        background: #fff;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        transition: right 0.3s ease;
        z-index: 9999;
        padding: 20px;
        overflow-y: auto;
    }
    .cart-slider.active {
        right: 0;
    }
    .cart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .btn-close {
        font-size: 24px;
        border: none;
        background: none;
        cursor: pointer;
    }
    .cart-body {
        margin-top: 20px;
    }
    .cart-footer {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }
</style>

<!-- JavaScript and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
 $(document).ready(function() {
    $('#addToCartButton').click(function(event) {
        event.preventDefault(); 

        var formData = $('#addToCartForm').serialize(); 

        $.ajax({
            url: "{{ route('cart.store') }}",  
            method: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Update the cart slider content and open it
                    $('#cartItems').html(response.cartItems);  
                    $('#cartSlider').addClass('active');  
                } else {
                    console.error('Error adding to cart:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error adding to cart:', error);
            }
        });
    });

    // Close cart slider
    $('#closeCartSlider').click(function() {
        $('#cartSlider').removeClass('active');
    });
});


</script>

