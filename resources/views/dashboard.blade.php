<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Stop Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            position: relative;
        }
        .toggle-submenu {
            cursor: pointer;
        }
        .submenu {
            display: none;
            margin-left: 20px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dashboard-section {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        .profile-icon {
            position: absolute;
            top: 10px;
            right: 20px;
        }
        .profile-icon a {
            color: #000;
            text-decoration: none;
        }
        .profile-icon a:hover {
            color: #007bff;
        }
        /* For Order Details CSS */
    .dashboard-section {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
    }

    .section-header {
        margin-bottom: 15px;
    }

    .section-header h4 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead {
        background-color: #007bff;
        color: white;
    }

    .table th, .table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #eaeaea;
    }

    .table select {
        padding: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    .table select:focus {
        border-color: #007bff;
        outline: none;
    }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>Shoes Stop Admin Panel</h4>
    <hr>
    <!-- Sidebar for navigating between sections -->
    
    <h5 class="toggle-submenu">Categories <span class="float-end">+</span></h5>
    <div class="submenu">
        <a href="#" id="main-categories">Main Categories</a>
        <a href="#" id="sub-categories">Sub-categories</a>
    </div>
    <hr>
    <h5 class="toggle-submenu">Products <span class="float-end">+</span></h5>
    <div class="submenu">
        <a href="{{route('products.index')}}" id="products">Products</a>
    </div>
    <hr>
    <h5 class="toggle-submenu">Orders <span class="float-end">+</span></h5>
    <div class="submenu">
        <a href="#" id="order-details">Order Details</a>
    </div>
</div>

<div class="content">
    <!-- Profile Icon with Edit Profile Link -->
    <div class="profile-icon">
        <a href="{{ route('admin.profile.edit') }}">
            <i class="fas fa-user-circle fa-2x"></i> 
        </a>
    </div>
    
    
    <div id="dashboard-content">
        
        <!-- Main Categories Section -->
        <div id="main-categories-section" class="dashboard-section" style="display: none;">
            <div class="section-header">
                <h4>Main Categories</h4>
                <a href="#" class="btn btn-success" id="add-main-category">Add New Category</a>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories ?? [] as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Subcategories Section -->
        <div id="sub-categories-section" class="dashboard-section" style="display: none;">
            <div class="section-header">
                <h4>Subcategories</h4>
                <a href="#" class="btn btn-success" id="add-subcategory">Add New Subcategory</a>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Subcategory Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories ?? [] as $subcategory)
                        <tr>
                            <td>{{ $subcategory->name }}</td>
                            <td>
                                <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Products Section -->
        <div id="products-section" class="dashboard-section" style="display: none;">
            <div class="section-header">
                <h4>Products</h4>
                <a href="#" class="btn btn-success" id="add-product">Add New Product</a>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products ?? [] as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Order Details Section -->
        <div id="order-details-section" class="dashboard-section" style="display: none;">
            <div class="section-header">
                <h4>Order Details</h4>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-Totals</th>
                        <th>Checkout ID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $orderItem)
                    <tr>
                        <td>{{ $orderItem->product->name }}</td>
                        <td>{{ number_format($orderItem->price, 2) }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                        <td>{{ number_format($orderItem->price * $orderItem->quantity, 2) }}</td> 
                        <td>{{ $orderItem->checkout_id }}</td>
                        <td id="status-{{ $orderItem->id }}">{{ $orderItem->status ?? 'Pending' }}</td>
                        <td>
                            <form id="status-form-{{ $orderItem->id }}">
                                @csrf
                                <select name="status" onchange="updateStatus({{ $orderItem->id }}, this.value)">
                                    <option value="Pending" {{ $orderItem->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="In Process" {{ $orderItem->status == 'In Process' ? 'selected' : '' }}>In Process</option>
                                    <option value="Delivered" {{ $orderItem->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="Cancelled" {{ $orderItem->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    // Handle sidebar navigation and show/hide sections dynamically
    document.getElementById('main-categories').addEventListener('click', function() {
        document.getElementById('main-categories-section').style.display = 'block';
        document.getElementById('sub-categories-section').style.display = 'none';
        document.getElementById('products-section').style.display = 'none';
        document.getElementById('order-details-section').style.display = 'none'; // Ensure the new Order Details section is hidden
    });

    document.getElementById('sub-categories').addEventListener('click', function() {
        document.getElementById('sub-categories-section').style.display = 'block';
        document.getElementById('main-categories-section').style.display = 'none';
        document.getElementById('products-section').style.display = 'none';
        document.getElementById('order-details-section').style.display = 'none'; // Ensure the new Order Details section is hidden
    });

    document.getElementById('products').addEventListener('click', function() {
        document.getElementById('products-section').style.display = 'block';
        document.getElementById('main-categories-section').style.display = 'none';
        document.getElementById('sub-categories-section').style.display = 'none';
        document.getElementById('order-details-section').style.display = 'none'; // Ensure the new Order Details section is hidden
    });

    document.getElementById('order-details').addEventListener('click', function() {
        document.getElementById('order-details-section').style.display = 'block';
        document.getElementById('main-categories-section').style.display = 'none';
        document.getElementById('sub-categories-section').style.display = 'none';
        document.getElementById('products-section').style.display = 'none'; // Hide other sections
    });

    // Toggle submenus in the sidebar
    document.querySelectorAll('.toggle-submenu').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const submenu = this.nextElementSibling;
            submenu.style.display = submenu.style.display === 'none' || submenu.style.display === '' ? 'block' : 'none';
        });
    });

    // Simulate navigating to the "Add New" forms within the dashboard itself
    document.getElementById('add-main-category').addEventListener('click', function() {
        window.location.href = '{{ route('categories.create') }}';
    });
    document.getElementById('add-subcategory').addEventListener('click', function() {
        window.location.href = '{{ route('subcategories.create') }}';
    });
    document.getElementById('add-product').addEventListener('click', function() {
        window.location.href = '{{ route('products.create') }}';
    });


    function updateStatus(orderItemId, status) {
    let formData = new FormData();
    formData.append('status', status); 

    fetch(`/dashboard/update-order-status/${orderItemId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Add CSRF Token
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`status-${orderItemId}`).innerText = status; // Update status in the DOM
        } else {
            alert('Error updating status: ' + data.message); // Show error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


</script>


</body>
</html>
