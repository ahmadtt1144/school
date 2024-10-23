<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .faq {
            background-color: #f8f9fa;
        }
        .faq h2 {
            color: white;
            background-color: #6c757d;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        .accordion-button {
            background-color: #ffffff;
            color: #333;
            border: 1px solid #6c757d;
            transition: background-color 0.3s;
        }
        .accordion-button:hover {
            background-color: #e2e6ea;
        }
        .accordion-button:focus {
            box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.25);
        }
        .accordion-item {
            border: none;
            margin-bottom: 10px;
        }
        .accordion-body {
            background-color: #f8f9fa;
            border: 1px solid #6c757d;
            border-radius: 5px;
        }
    </style>
    <title>FAQ Section</title>
</head>
<body>
@include('pages.nav')
<section class="faq py-5">
    <div class="container">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>

        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        What payment methods do you accept?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We accept various payment methods, including credit cards, debit cards, and PayPal. All transactions are secure and encrypted.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        How can I track my order?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        After your order is shipped, you will receive a confirmation email with a tracking number. You can use this number on our website to track your order.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        What is your return policy?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We offer a 30-day return policy on all products. If you are not satisfied with your purchase, you can return it for a full refund or exchange, provided it is in its original condition.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Do you offer international shipping?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, we offer international shipping to select countries. Shipping fees and delivery times vary depending on your location.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Can I change my order after placing it?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        If you need to change your order, please contact our customer service as soon as possible. We can make changes if your order has not yet been processed.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('Footer.main')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
