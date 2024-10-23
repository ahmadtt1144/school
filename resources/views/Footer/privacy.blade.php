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
        .privacy-section {
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
        ol {
            margin-bottom: 15px;
        }
        .policy{
            background-color:grey;
            color:white;
            padding:3px 3px;
        }
    </style>
    <title>Privacy Policy</title>
</head>
<body>
@include('pages.nav')
<div class="container privacy-section">
    <div class="policy">
    <h1>Privacy Policy</h1>
    </div>

    <p>Welcome to Shoes-Stop! This privacy policy outlines how we collect, use, and protect your information when you visit our website.</p>

    <h2>1. Information We Collect</h2>
    <p>We may collect personal information from you when you visit our site, place an order, subscribe to our newsletter, or interact with us in other ways. The information we may collect includes:</p>
    <ul>
        <li>Your name</li>
        <li>Email address</li>
        <li>Phone number</li>
        <li>Shipping address</li>
        <li>Payment information</li>
    </ul>

    <h2>2. How We Use Your Information</h2>
    <p>We use the information we collect from you for various purposes, including:</p>
    <ul>
        <li>Processing and fulfilling your orders</li>
        <li>Improving our website and services</li>
        <li>Communicating with you, including sending you updates and promotional materials</li>
        <li>Responding to your inquiries and requests</li>
        <li>Preventing fraud and ensuring the security of our website</li>
    </ul>

    <h2>3. Sharing Your Information</h2>
    <p>We do not sell, trade, or otherwise transfer your personal information to outside parties, except to provide services you have requested or as required by law. We may share your information with trusted third-party service providers who assist us in operating our website, conducting our business, or servicing you, as long as those parties agree to keep this information confidential.</p>

    <h2>4. Security of Your Information</h2>
    <p>We take reasonable precautions to protect your personal information from unauthorized access, use, or disclosure. However, please be aware that no method of transmission over the Internet or method of electronic storage is 100% secure, and we cannot guarantee its absolute security.</p>

    <h2>5. Your Rights</h2>
    <p>You have the right to request access to the personal information we hold about you and to ask for corrections to be made to it. You can also request the deletion of your personal information under certain circumstances.</p>

    <h2>6. Changes to This Privacy Policy</h2>
    <p>We may update our privacy policy from time to time. We will notify you of any changes by posting the new privacy policy on this page. You are advised to review this privacy policy periodically for any changes.</p>

    <h2>7. Contact Us</h2>
    <p>If you have any questions about this privacy policy or our practices regarding your personal information, please contact us at [Your Email].</p>
</div>
@include('Footer.main')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
