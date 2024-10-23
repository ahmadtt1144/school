<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category; 
use App\Models\Product; // Include Product model
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    // Index method to list all subcategories
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategories.index', compact('subcategories'));
    }

    // Create method
    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    // Store method
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully!');
    }

    // Edit method
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    // Update method
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully!');
    }

    // Destroy method
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully!');
    }

   
//     public function show($id)
// {
//     // Fetch the subcategory based on the id
//     $subcategory = Subcategory::findOrFail($id);
    
//     // Fetch the products that belong to this subcategory
//     $products = Product::where('subcategory_id', $id)->get();
    
//     // Pass the subcategory and products to the view located in 'subcategories/show.blade.php'
//     return view('subcategories.show', compact('subcategory', 'products'));
// }
public function showProducts($id)
{
    // Fetch the subcategory based on the ID
    $subcategory = Subcategory::findOrFail($id);
    
    // Fetch the products that belong to this subcategory
    $products = Product::where('subcategory_id', $id)->get();
    
    // Return the view and pass the subcategory and products
    return view('subcategories.show', compact('subcategory', 'products'));
}


}
