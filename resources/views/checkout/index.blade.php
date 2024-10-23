<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Shoes Stop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            color: #007bff;
        }

        .container {
            padding: 20px;
        }

        .checkout-form, .cart-summary {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .flex-container > div {
            flex: 1;
            margin: 0 10px;
        }

        .cart-item-image {
            position: relative;
            width: 80px; 
            height: 80px; 
        }

        .cart-item-image img {
            border-radius: 4px;
            width: 100%; 
            height: 100%; 
        }

        .quantity-label {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(0, 123, 255, 0.8); 
            color: white; 
            padding: 2px 5px; 
            border-radius: 3px; 
            font-size: 0.8rem; 
        }

        h4 {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Shoes Stop</h1>
    </div>

    <div class="container">
        <div class="flex-container">
            <!-- Left side: Checkout Form -->
            <div class="checkout-form">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <h4>Contact Information</h4>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    
                    <!-- Delivery Section -->
                    <h4>Delivery Details</h4>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <select name="country" class="form-control" required>
                            <option value="Pakistan">Pakistan</option>
                            <option value="USA">USA</option>
                            <option value="Australia">Australia</option>
                            <option value="England">England</option>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code:</label>
                        <input type="text" name="postal_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    
                    <!-- Save info for next time -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="save_info">
                        <label class="form-check-label" for="save_info">Save this info for next time</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Checkout</button>
                </form>
            </div>

            <!-- Right side: Cart Summary -->
            <div class="cart-summary">
                <h4>Your Cart</h4>
                @foreach($cartItems as $item)
                    <div class="d-flex align-items-center mb-3">
                        <div class="cart-item-image">
                            <img src="{{ asset('uploads/products/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                            <span class="quantity-label">{{ $item->quantity }}</span> 
                        </div>
                        <div class="cart-item-details ml-3"> 
                            <p>Model: {{ $item->product->model }}</p>
                            <p>Price: Rs. {{ number_format($item->product->price, 2) }}</p>
                            <p>Subtotal: Rs. {{ number_format($item->subtotal, 2) }}</p>
                            <hr>
                        </div>
                    </div>
                @endforeach

                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Subtotal</strong>
                    <span>Rs. {{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <span>Rs. {{ number_format($total, 2) }}</span>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
