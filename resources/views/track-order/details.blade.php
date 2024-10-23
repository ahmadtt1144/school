@include('pages.nav')
<div class="container mt-5">
    <h2 class="text-center mb-4">Order Tracking</h2>
    <h4 class="text-center">Order Details for Order #{{ $checkout->order_no }}</h4>

    @if ($orderItems && $orderItems->count() > 0)
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }}</td>
                            <td>{{ number_format($item->price * $item->quantity, 2) }}</td> <!-- Calculate subtotal -->
                            <td>{{ ucfirst($item->status) }}</td> <!-- Capitalize status -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-danger">No items found for this order.</p>
    @endif

    
    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-success">Continue Shopping</a>
    </div>
</div>

<style>
    .container {
        background-color: #f8f9fa; 
        border-radius: 5px; 
        padding: 20px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    h2, h4 {
        color: #333; 
    }

    .table {
    }

    .table th {
        background-color: #007bff; 
        color: white; 
    }

    .table td {
        vertical-align: middle; 
    }

    .text-danger {
        color: #dc3545; 
    }

    .mt-4 {
        margin-top: 20px; 
    }

    .table-responsive {
        margin-top: 20px; 
    }
</style>
