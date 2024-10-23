<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\OrderTrackingController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AdminProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be
| assigned to the "web" middleware group.
|
*/

// Route for the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route for the register form
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Redirect the user to the login form when they click the Account icon
Route::get('/account', [LoginController::class, 'showLoginForm'])->name('account');

// Protected navbar route (only for authenticated users)
Route::get('/navbar', function () {
    return view('pages.nav');
})->name('navbar')->middleware('auth');

// Routes for Wishlist and Cart (no changes needed)
Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

// Add a route to handle redirection after registration
Route::get('/redirect-after-registration', function () {
    return redirect()->route('login')->with('success', 'Registration successful, please log in.');
})->name('redirect.after.registration');

// Routes for the CRUD of Products 

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');



// Dashboard 
 
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');

Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubcategoryController::class);

// Add  Route to handle AJAX request
Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategories');


 Route::get('/dashboard/{category_id?}', [DashboardController::class, 'index'])->name('dashboard');


// Resource routes for categories and subcategories
Route::resource('categories', CategoryController::class)->except(['show']);
Route::resource('subcategories', SubcategoryController::class)->except(['show']);


Route::get('/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
Route::get('/categories/{category}/subcategories', [CategoryController::class, 'subcategories'])->name('categories.subcategories');
Route::put('/subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');

// Route for the landing page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/subcategories/{id}', [SubcategoryController::class, 'show'])->name('subcategory.show');

Route::get('/subcategory/{id}/products', [SubcategoryController::class, 'showProducts'])->name('subcategory.showProducts');
Route::get('/subcategory/{id}/products', [SubcategoryController::class, 'showProducts'])->name('subcategory.products');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/subcategories/{subcategory}', [SubcategoryController::class, 'show'])->name('subcategory.show');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


//cart

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

// CheckOut
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');



// Order Details
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::put('/admin/orders/{id}', [DashboardController::class, 'updateOrderStatus'])->name('admin.orders.update');

Route::post('/dashboard/order/update/{id}', [DashboardController::class, 'updateOrderStatus'])->name('order.update');
Route::post('/dashboard/update-order-status/{id}', [OrderController::class, 'updateOrderStatus']);


//Footer
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/return', [PageController::class, 'returnPolicy'])->name('return');
Route::post('/contact/submit', [ContactUsController::class, 'submitForm'])->name('contact.submit');


Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

// Track Order
Route::get('/track-order', [OrderTrackingController::class, 'index'])->name('track.order');
Route::post('/track-order', [OrderTrackingController::class, 'trackOrder'])->name('track.order.submit');

// For search
Route::get('/search/products', [ProductController::class, 'search']);

//For Profile Update
Route::get('admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');



