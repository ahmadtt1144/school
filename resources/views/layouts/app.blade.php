<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Shoes Stop Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-width: 250px;
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            max-height: calc(100vh - 40px); 
        }
        .toggle-submenu {
            cursor: pointer;
        }
        .submenu {
            display: none;
            margin-left: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>Shoes Stop Admin Panel</h4>
    <hr>
    
    <!-- Categories Submenu -->
   
    <h5 class="toggle-submenu">Categories <span class="float-end">+</span></h5>
    <div class="submenu">
        <a href="{{ route('categories.index') }}">Main Categories</a>
        <a href="{{ route('subcategories.index') }}">Subcategories</a>
    </div>
    
    <hr>
    
    <!-- Products Submenu with updated structure -->
    <h5 class="toggle-submenu">Products <span class="float-end">+</span></h5>
    <div class="submenu">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">Products</a>
            </li>
        </ul>
    </div>
</div>


<div class="content">
    @yield('content')
</div>

<script>
    // Sidebar toggle logic (optional JS)
    document.querySelectorAll('.toggle-submenu').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const submenu = this.nextElementSibling;
            submenu.style.display = submenu.style.display === 'none' || submenu.style.display === '' ? 'block' : 'none';
        });
    });
</script>

</body>
</html>
