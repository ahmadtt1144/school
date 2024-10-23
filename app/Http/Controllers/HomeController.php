<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::all(); 
        // Fetch all categories
        $categories = Category::with('subcategories')->get(); 
        return view('home', compact('featuredProducts', 'categories'));
    }
}
