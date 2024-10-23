@include('pages.nav')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Track Your Order</h3>
                    <form action="{{ route('track.order.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="order_number" class="form-label">Order Number</label>
                            <input type="text" class="form-control" id="order_number" name="order_number" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Track Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
    background-color: #f8f9fa; 
}

.card {
    border: none; 
    border-radius: 10px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
}

.card-body {
    padding: 30px; 
}

h3 {
    color: #007bff; 
}

.form-label {
    font-weight: bold; 
}

.btn-primary {
    background-color: #007bff; 
    border: none; 
    transition: background-color 0.3s; 
}

.btn-primary:hover {
    background-color: #0056b3; 
}

.mb-3 {
    margin-bottom: 20px; 
}

@media (max-width: 576px) {
    .card {
        width: 100%; 
    }
}

</style>