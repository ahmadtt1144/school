<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;


class ProductController extends Controller
{
    //This method will show product page
    public function index(){
      $products= Product:: orderBy('created_at','DESC')->get();
      return view('products.list',[
       'products' => $products
      ]);
    
    }

    public function create()
{
    // Fetch all categories and subcategories
    $categories = Category::all();
    $subcategories = Subcategory::all(); 
    
    
    return view('products.create', compact('categories', 'subcategories'));
}
      // This method will store product in the database
public function store(Request $request)
{
    // Validation rules for product fields
    $rules = [
        'name' => 'required|min:3|string|max:255',
        'model' => 'required|min:3|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',  
        'subcategory_id' => 'required|exists:subcategories,id',  
    ];

    // For the image  request, add an image validation rule
    if ($request->image != "") {
        $rules['image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';  
    }
    $validator = Validator::make($request->all(), $rules);

    // If validation fails, redirect back to the product creation page with errors
    if ($validator->fails()) {
        return redirect()->route('products.create')->withInput()->withErrors($validator);
    }

    // Now we will store the product in the database
    $product = new Product();
    $product->name = $request->name;
    $product->model = $request->model;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->category_id = $request->category_id; 
    $product->subcategory_id = $request->subcategory_id;  

    $product->save();  

    // If an image is uploaded, store it
    if ($request->image != "") {
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();  
        $imageName = time() . '.' . $ext;  

        // Save the image name in the product
        $product->image = $imageName;
        $product->save();

        // Move the uploaded image to the 'uploads/products' directory
        $image->move(public_path('uploads/products'), $imageName);
    }
    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}

     //This method will edit the product
     public function edit($id){
      $product=Product::findOrFail($id);
      return view('products.edit',[
        'product' =>$product
    ]);
  
     }

     //This method will update product
   
public function update($id, Request $request){

  $product = Product::findOrFail($id);

  // Validation rules
  $rules = [
      'name'=> 'required|min:3',
      'model'=> 'required|min:3',
      'price'=> 'required|numeric',
      'description' => 'nullable'
  ];
  
  if ($request->hasFile('image')) {
      $rules['image'] = 'image';
  }

  $validator = Validator::make($request->all(), $rules);

  if ($validator->fails()) {
      return redirect()->route('products.edit', $product->id)
                       ->withInput()
                       ->withErrors($validator);
  }

  // Update product details
  $product->name = $request->name;
  $product->model = $request->model;
  $product->price = $request->price;
  $product->description = $request->description;
  
  // Handle image upload if provided
  if ($request->hasFile('image')) {
      // Delete the old image if exists
      if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
          File::delete(public_path('uploads/products/' . $product->image));
      }

      // Upload new image
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('uploads/products'), $imageName);

      // Update the product's image field
      $product->image = $imageName;
  }

  $product->save();

  return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

     //This method will delete product page
     public function destroy($id)
{
    $product = Product::findOrFail($id);

    // Delete the product image if exists
    if ($product->image && File::exists(public_path('uploads/products/' . $product->image))) {
        File::delete(public_path('uploads/products/' . $product->image));
    }

    // Delete the product from the database
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}

// To get subcategories of selected category

public function getSubcategories(Request $request)
{
    $subcategories = Subcategory::where('category_id', $request->category_id)->get();
    $options = "<option value=''>Select Subcategory</option>";
    
    foreach ($subcategories as $subcategory) {
        $options .= "<option value='{$subcategory->id}'>{$subcategory->name}</option>";
    }

    return response()->json($options);
}


    // public function show($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $cartItems = session()->get('cart', []);
    
    //     return view('Products.show', compact('product', 'cartItems'));
    // }
    public function show($id)
    {
        $product = Product::findOrFail($id); 
    
        // Fetch the current user's cart items
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get(); 
    
        return view('products.show', compact('product', 'cartItems')); 
    }
    


// Controller Method for Product Search
public function search(Request $request)
{
    $query = $request->input('query');

    $products = Product::where('name', 'like', "%{$query}%")->get();

    // Map the products to include the image path
    $products->map(function($product) {
        $product->image = asset('uploads/products/' . $product->image); 
        return $product;
    });

    // Return the JSON response
    return response()->json($products);
}


    

    

}


