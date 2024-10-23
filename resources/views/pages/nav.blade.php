<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Stop</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <!-- Top Banner -->
    <div class="top-banner text-center py-2">
        Free Delivery Nationwide for Orders PKR 3000 and Above
    </div>

    <!-- Header -->
    <header class="container-fluid py-3 mobile-header">
        <div class="d-flex justify-content-between align-items-center">

            <!-- Menu Icon (Left) -->
            <div class="menu-icon">
                <i class="fa-solid fa-bars" id="menu-toggle"></i>
            </div>

            <!-- Website Name (Center) -->
            <div class="text-center logo">
                Shoe Stop
            </div>

            <!-- Right-Side Icons (Right) -->
            <div class="header-icons d-flex me-2">
                <a href="{{ route('register') }}" class="me-3">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="#" class="me-3" id="search-toggle">
                    <i class="fa-solid fa-search"></i>
                </a>
                <a href="{{ route('cart.index') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="badge bg-danger position-absolute" id="cart-item-count">{{ $totalItems ?? 0 }}</span>
                </a>
            </div>

        </div>
    </header>

    <!-- Sidebar Menu (Left) -->
    <div id="sidebar" class="offcanvas-menu">
        <span class="offcanvas-close" id="close-sidebar">&times;</span>

        <ul>
            @foreach($categories as $category)
                <li class="category-item">
                    <span>{{ $category->name }}</span>
                    @if($category->subcategories->count() > 0)
                        <ul class="subcategory-list">
                            @foreach($category->subcategories as $subcategory)
                                <li>
                                    <a href="{{ route('subcategory.products', $subcategory->id) }}">{{ $subcategory->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

            <li class="category-item">
                <a href="{{ route('track.order') }}" class="track-order">Track Your Order</a>
            </li>
        </ul>
    </div>

    <!-- Search Slider (Right) -->
    <div id="search-slider" class="search-slider">
        <span class="offcanvas-close" id="close-search-slider">&times;</span>
        <form id="search-form">
            <div class="p-3">
                <h5>Search Our Site</h5>
                <input type="text" id="search-input" name="query" class="form-control" placeholder="Search for products..." required>
                <ul id="search-results" class="list-group mt-2" style="display: none;"></ul> 
               
            </div>
        </form>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const closeSidebar = document.getElementById('close-sidebar');

    const searchToggle = document.getElementById('search-toggle');
    const searchSlider = document.getElementById('search-slider');
    const closeSearchSlider = document.getElementById('close-search-slider');

    // Open/Close the left sidebar
    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
    });

    closeSidebar.addEventListener('click', function () {
        sidebar.classList.remove('open');
        overlay.classList.remove('active');
    });

    // Open/Close the search slider
    searchToggle.addEventListener('click', function () {
        searchSlider.classList.toggle('open');
        overlay.classList.toggle('active');
    });

    closeSearchSlider.addEventListener('click', function () {
        searchSlider.classList.remove('open');
        overlay.classList.remove('active');
    });

    overlay.addEventListener('click', function () {
        sidebar.classList.remove('open');
        searchSlider.classList.remove('open');
        overlay.classList.remove('active');
    });

    // Correct search functionality
    const searchInput = document.getElementById('search-input'); 
const searchResults = document.getElementById('search-results');

searchInput.addEventListener('input', function () {
    const query = searchInput.value;

    if (query.length > 0) {
        // Perform AJAX request to search for products
        fetch(`/search/products?query=${query}`)
            .then(response => response.json())
            .then(data => {
                // Clear previous results
                searchResults.innerHTML = '';
                searchResults.style.display = 'block';

                // Loop through the returned products
                data.forEach(product => {
                    const productItem = document.createElement('div');
                    productItem.className = 'product-item d-flex align-items-center mb-3';

                    // Create the product's image, name, and price HTML
                    productItem.innerHTML = `
                        <img src="${product.image}" alt="${product.name}" class="product-image me-3" style="width: 60px; height: auto;">
                        <div class="product-info">
                            <h5>${product.name}</h5>
                            <p>Price: PKR ${product.price}</p>
                        </div>
                    `;

                    // Add event listener for clicking on the product (redirect to product page)
                    productItem.addEventListener('click', function() {
                        window.location.href = `/products/${product.id}`;  // Correct URL for product detail page
                    });

                    // Append the product to the search results container
                    searchResults.appendChild(productItem);
                });
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
            });
    } else {
        searchResults.style.display = 'none';
    }
});


    </script>

    <!-- Updated CSS -->
    <style>
    /* Sidebar Styles */
    .offcanvas-menu {
        position: fixed;
        top: 0;
        left: -250px; 
        width: 250px;
        height: 100%;
        background-color: #343a40; 
        transition: left 0.3s ease;
        z-index: 1050;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
    }
    .offcanvas-menu.open {
        left: 0; 
    }
    .offcanvas-close {
        cursor: pointer;
        font-size: 24px;
        color: white; 
    }

    /* Overlay Styles */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1040;
    }
    .overlay.active {
        display: block;
    }

    /* Search Slider Styles */
    .search-slider {
        position: fixed;
        top: 0;
        right: -250px; 
        width: 250px;
        height: 100%;
        background-color: #f8f9fa;
        transition: right 0.3s ease;
        z-index: 1050;
        padding: 20px;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
    }
    .search-slider.open {
        right: 0; 
    }

    /* Search Product Flexbox Styles */
    .product-item {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
        cursor: pointer;
    }

    .product-item:hover {
        background-color: #f8f9fa;
    }

    .product-image {
        /* width: 250px;
        height: 250px; */
        object-fit: cover;
        border-radius: 4px;
    }

    .product-info h5 {
        font-size: 16px;
        margin: 0;
    }

    .product-info p {
        margin: 0;
        font-size: 14px;
        color: #777;
    }
    </style>
</body>

</html>
