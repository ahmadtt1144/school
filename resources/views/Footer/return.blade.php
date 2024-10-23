<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .return-exchange-section {
            padding: 50px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #343a40;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #6c757d;
        }
        h2 {
            margin-top: 20px;
            margin-bottom: 15px;
        }
        p {
            margin-bottom: 15px;
            line-height: 1.6;
        }
        ul {
            margin-bottom: 15px;
        }
        .return{
            background-color:grey;
            color:white;
            padding:3px 3px;
        }
    </style>
    <title>Return and Exchange Policy</title>
</head>
<body>
@include('pages.nav')
<div class="container return-exchange-section">
    <div class="return">
    <h1>Return and Exchange Policy</h1>
    </div>

    <p>Thank you for shopping at Shoes-Stop! We want you to be completely satisfied with your purchase. If you are not satisfied, we offer a simple and hassle-free return and exchange process.</p>

    <h2>1. Return Policy</h2>
    <p>You may return most new, unopened items within 30 days of delivery for a full refund. To be eligible for a return, your item must be:</p>
    <ul>
        <li>Unused and in the same condition that you received it.</li>
        <li>In the original packaging.</li>
        <li>Accompanied by a receipt or proof of purchase.</li>
    </ul>

    <h2>2. Exchange Policy</h2>
    <p>If you wish to exchange an item for a different size or color, please follow our return process to send back the original item and place a new order for the desired item. If you receive a defective or damaged item, please contact us within 7 days of receipt for assistance with an exchange.</p>

    <h2>3. Return Process</h2>
    <p>To initiate a return, please follow these steps:</p>
    <ol>
        <li>Contact our customer service at [Your Email] to request a return.</li>
        <li>Package the item securely and include your order number.</li>
        <li>Ship the package to the address provided by our customer service.</li>
    </ol>

    <h2>4. Refunds</h2>
    <p>Refunds will be processed within 7-14 business days after we receive your returned item. The refund will be issued to the original payment method used for the purchase.</p>

    <h2>5. Non-Returnable Items</h2>
    <p>Some items cannot be returned, including:</p>
    <ul>
        <li>Gift cards</li>
        <li>Sale items</li>
    </ul>

    <h2>6. Contact Us</h2>
    <p>If you have any questions or concerns regarding our return and exchange policy, please feel free to contact us at [Your Email].</p>
</div>
@include('Footer.main')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
