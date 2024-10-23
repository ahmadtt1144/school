<!-- Footer Section -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Get in Touch Section -->
            <div class="col-md-3 mb-4">
                <h5>Get in touch</h5>
                <p>
                    Ground Floor,G1-642/L-Block,<br>
                    Near Emprorium Shopping Mall,Lahore, 54000
                </p>
                <p>Email: <a href="mailto:shoes_step@gmail.com.pk" class="text-white">shoes_step@gmail.com.pk</a></p>
                <p>Phone: 051-5519497-127</p>
                <p>Office Timings: 10:30 AM to 6:00 PM Mon to Fri</p>
            </div>

            <!-- Explore by Collection Section -->
            <div class="col-md-3 mb-4">
                <h5>Explore by Collection</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Men</a></li>
                    <li><a href="#" class="text-white">Women</a></li>
                    <li><a href="#" class="text-white">Bags</a></li>
                    <li><a href="#" class="text-white">Clothing</a></li>
                    <li><a href="#" class="text-white">Accessories</a></li>
                    <li><a href="#" class="text-white">Sale</a></li>
                </ul>
            </div>

            <!-- Explore Section -->
            <div class="col-md-3 mb-4">
                <h5>Explore</h5>
                <ul class="list-unstyled">
    <li><a href="{{ route('about') }}" class="text-white">About Us</a></li>
    <li><a href="{{ route('contact') }}" class="text-white">Contact Us</a></li>
    <li><a href="{{ route('faq') }}" class="text-white">FAQs</a></li>
    <li><a href="{{ route('terms') }}" class="text-white">Terms & Conditions</a></li>
    <li><a href="{{ route('privacy') }}" class="text-white">Privacy Policy</a></li>
    <li><a href="{{ route('return') }}" class="text-white">Return & Exchange</a></li>
</ul>
            </div>

            <!-- Connect Section -->
            <div class="col-md-3 mb-4">
                <h5>Connect</h5>
                <form action="#" method="POST">
                    <div class="form-group mb-2">
                        <input type="email" class="form-control" placeholder="Your email address">
                    </div>
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>

                </form>
                <div class="social-icons mt-3">
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-pinterest"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="text-center py-3">
            <p>&copy; 2024 Shoes Stop. All rights reserved.</p>
        </div>
    </div>
</footer>
<style>
        /* Footer Styling */
footer {
    background-color: #343a40;
    color: white;
}

footer h5 {
    color: #ff3333; 
    font-weight: bold;
}

footer a {
    color: #ffffff; 
    text-decoration: none;
}

footer a:hover {
    text-decoration: underline; 
}

footer ul {
    padding-left: 0;
}

footer ul li {
    list-style: none;
    margin-bottom: 0.5rem;
}

footer .social-icons i {
    font-size: 1.5rem; 
    margin-right: 10px;
}

footer .form-control {
    background-color: #50575e; 
    border: none;
    color: white;
}

footer .form-control::placeholder {
    color: #ccc; 
}

footer .btn-primary {
    background-color: #ff3333; 
    border: none;
}

footer .btn-primary:hover {
    background-color: #e60000; 
}

footer .row > div {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">