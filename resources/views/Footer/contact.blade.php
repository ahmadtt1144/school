<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Header styling */
        .contact-header {
            background-color: #555;
            color: white;
            padding: 20px 0; 
            margin-bottom: 40px;
        }

        .contact-header h1 {
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Form container */
        .form-container {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border: 2px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Button styling */
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Contact info styling */
        .contact-info {
            background-color: #e9ecef;
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .contact-info h3 {
            color: #333;
        }

        .contact-info p {
            color: #555;
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Small devices adjustments */
        @media (max-width: 768px) {
            .form-container, .contact-info {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
@include('pages.nav')
    <section class="contact-header text-center">
        <h1>Contact Us</h1>
    </section>

    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6 form-container">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Your Name (required)</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email (required)</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" name="message" id="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
            <br>

            <!-- Contact Info -->
            <div class="col-lg-6 contact-info">
                <h3>Shoes Stop Head Office</h3>
                <p>Lahore, Pakistan</p>
                <p><strong>Phone:</strong>  051-5519497-127</p>
                <p><strong>Email:</strong> shoes_step@gmail.com.pk</p>
            </div>
        </div>
    </div>
    @include('Footer.main')
</body>
</html>
