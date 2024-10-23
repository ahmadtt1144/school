<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display all categories along with subcategories for the sidebar or landing page
    public function index()
    {
        // Fetch categories along with subcategories
        $categories = Category::with('subcategories')->get();

        // Return the view where the categories sidebar is displayed
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a new category in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    // Show the form for editing an existing category
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update an existing category in the database
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete a category from the database
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    // Fetch and display subcategories for a specific category
    public function subcategories(Category $category)
    {
        $subcategories = $category->subcategories; // This will call the subcategories relationship in the Category model

        return view('categories.subcategories', compact('category', 'subcategories'));
    }

    // To show a category in the landing page (for featured products or category detail page)
    public function show($id)
{
    $category = Category::with('products')->findOrFail($id);

    // Pass the category to the view
    return view('category.show', compact('category'));
}

}
