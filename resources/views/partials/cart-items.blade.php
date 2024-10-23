@foreach($cartItems as $cartItem)
    <div class="cart-item mb-3 p-3 border-bottom d-flex flex-column">
        <!-- Product Name -->
        <div class="cart-item-title mb-2">
            <strong>{{ $cartItem->product->name ?? 'Unknown Product' }}</strong>
        </div>

        <div class="d-flex align-items-start">
            <!-- Product Image -->
            <div class="cart-item-image me-3">
                <img src="{{ asset('uploads/products/' . ($cartItem->product->image ?? 'default.jpg')) }}" 
                     alt="{{ $cartItem->product->name ?? 'Product Image' }}" 
                     style="width: 70px; height: 70px; object-fit: cover; border-radius: 5px;">
            </div>

            <!-- Product Details and Actions -->
            <div class="cart-item-actions d-flex flex-column flex-grow-1">
                <div class="d-flex align-items-center justify-content-between w-100 mb-2">
                    <!-- Quantity Adjustment -->
                    <div class="cart-item-quantity me-2">
                        <form action="{{ route('cart.update', $cartItem->id) }}" method="POST" class="d-flex align-items-center update-cart-form">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="form-control form-control-sm" style="max-width: 60px;">
                            <button type="submit" class="btn btn-sm btn-secondary ms-2">Update</button>
                        </form>
                    </div>
                </div>

                <!-- Remove Button -->
                <div class="d-flex justify-content-between w-100">
                    <!-- Product Price -->
                    <div class="cart-item-price">
                        <p>Rs. {{ number_format($cartItem->product->price ?? 0) }}</p>
                    </div>

                    <!-- Remove Button -->
                    <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST" class="ms-auto remove-cart-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle update form submission
        document.querySelectorAll('.update-cart-form').forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                const formData = new FormData(form);
                const actionUrl = form.action;

                fetch(actionUrl, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Optionally update the cart items displayed in the slider
                        // You can re-fetch the cart items or update the DOM directly
                        console.log(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        // Handle remove form submission
        document.querySelectorAll('.remove-cart-btn').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();  // Prevent default form submission

            const cartItemId = this.getAttribute('data-id');
            const url = `/cart/${cartItemId}`;

            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);  // Optionally, you can remove the item from DOM or reload cart items
                } else {
                    alert('Failed to delete item.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>


<style>
    .cart-item {
    background-color: #f9f9f9;
    border-radius: 5px;
}

.cart-item-title {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.cart-item-image img {
    border: 1px solid #ddd;
    border-radius: 5px;
}

.cart-item-actions {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.cart-item-quantity input {
    max-width: 60px;
    height: 30px;
    text-align: center;
}

.cart-item-price {
    color: #333;
    font-size: 14px;
    font-weight: bold;
    margin-right: 10px;
}

.btn {
    border-radius: 4px;
    padding: 5px 10px;
    font-size: 14px;
}

.btn-danger {
    background-color: #e74c3c;
    border-color: #e74c3c;
    color: #fff;
    margin-right:100px;
}

.btn-secondary {
    background-color: #95a5a6;
    border-color: #95a5a6;
    color: #fff;
    margin-left:40px;
    

  
}



</style>