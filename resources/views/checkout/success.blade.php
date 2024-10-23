<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 40px;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #28a745;
            text-align: center;
        }

        .checkmark {
            display: inline-block;
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 20px;
            text-align: center;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            margin: 40px 0;
        }

        .step {
            text-align: center;
            width: 30%;
            position: relative;
        }

        .step:before {
            content: '';
            position: absolute;
            top: 50%;
            left: -50%;
            right: 50%;
            width: 100%;
            height: 3px;
            background-color: #28a745;
            z-index: -1;
        }

        .step:first-child:before {
            display: none;
        }

        .step.completed .circle {
            background-color: #28a745;
            color: white;
        }

        .circle {
            display: inline-block;
            font-size: 1.5rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid #28a745;
            line-height: 55px;
            text-align: center;
            background-color: white;
        }

        .text {
            margin-top: 10px;
            font-size: 1.2rem;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            font-size: 1.2rem;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-body text-center">
            <div class="checkmark">✔</div>
            <h2>Order Placed Successfully!</h2>
            <p>Thank you for shopping with us. Your order has been successfully placed and will be processed soon.</p>

            <h4>Order Details</h4>
            <p><strong>Order Number:</strong> {{ $orderNo }}</p>
            <p><strong>Name:</strong> {{ $checkout->first_name }} {{ $checkout->last_name }}</p>
            <p><strong>Email:</strong> {{ $checkout->email }}</p>
            <p><strong>Phone:</strong> {{ $checkout->phone }}</p>

            <div class="steps">
                <div class="step completed">
                    <div class="circle">1</div>
                    <div class="text">Cart</div>
                </div>
                <div class="step completed">
                    <div class="circle">2</div>
                    <div class="text">Checkout</div>
                </div>
                <div class="step completed">
                    <div class="circle">3</div>
                    <div class="text">Order Placed</div>
                </div>
            </div>

            <a href="/" class="btn btn-success">Continue Shopping</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>