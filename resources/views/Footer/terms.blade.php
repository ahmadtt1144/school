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
        .terms-section {
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
            font-size:18px;
        }
        ol {
            margin-bottom: 15px;
        }
        .terms{
            background-color:grey;
            color:white;
            padding:3px 3px;
        }
    </style>
    <title>Terms and Conditions</title>
</head>
<body>
@include('pages.nav')
<div class="container terms-section">
   <div class="terms">
   <h1>Terms and Conditions</h1>
   </div> 

    <p>Welcome to Shoes-Stop! These terms and conditions outline the rules and regulations for the use of our website.</p>

    <h2>1. Introduction</h2>
    <p>By accessing this website, you agree to comply with these terms and conditions. If you do not agree with any part of these terms, you must not use our website.</p>

    <h2>2. Use of the Site</h2>
    <p>You agree to use this site only for lawful purposes and in a manner that does not infringe the rights of, restrict, or inhibit anyone else’s use of the site.</p>

    <h2>3. Intellectual Property</h2>
    <p>All content, trademarks, and other intellectual property on this website are the property of Shoes-Stop or our licensors. You may not reproduce, distribute, or exploit any of the content without our prior written consent.</p>

    <h2>4. Products</h2>
    <p>All products offered on our website are subject to availability. We reserve the right to discontinue any product at any time without prior notice.</p>

    <h2>5. Pricing</h2>
    <p>All prices on our website are in [Your Currency] and are subject to change. We strive to ensure that all prices are accurate, but errors may occur. In the event of a pricing error, we will notify you and give you the option to proceed with the order at the correct price or cancel it.</p>

    <h2>6. Payment</h2>
    <p>We accept various payment methods, including credit cards, debit cards, and PayPal. All transactions are processed securely.</p>

    <h2>7. Returns and Refunds</h2>
    <p>If you are not satisfied with your purchase, you may return it within 30 days of receipt for a full refund or exchange, provided it is in its original condition.</p>

    <h2>8. Limitation of Liability</h2>
    <p>To the maximum extent permitted by law, Shoes-Stop shall not be liable for any indirect, incidental, or consequential damages arising from your use of this website.</p>

    <h2>9. Governing Law</h2>
    <p>These terms and conditions are governed by and construed in accordance with the laws of [Your Country].</p>

    <h2>10. Changes to Terms</h2>
    <p>We reserve the right to modify these terms and conditions at any time. Your continued use of the site after any changes will constitute your acceptance of the new terms.</p>

    <h2>Contact Us</h2>
    <p>If you have any questions about these Terms and Conditions, please contact us at [Your Email].</p>
</div>
@include('Footer.main')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
