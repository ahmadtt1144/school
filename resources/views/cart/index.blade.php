<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
    .check{
        justify-content:center;
        text-align:center;
        display:flex;
        margin:50px;
    }
</style>
@include('pages.nav')

<div class="container mt-5">
    <h2>Your Cart</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $cart)
                <tr>
                    <td>{{ $cart->product->name }}</td>
                    <td>Rs:{{ $cart->product->price }}</td>
                    <td>
                        <form action="{{ route('cart.update', $cart->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                    <td>Rs:{{ $cart->product->price * $cart->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    <div class="check">
    <a href="{{ route('checkout.index') }}" class="btn btn-success ms-2">Checkout</a> 
    </div>
                
                
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
