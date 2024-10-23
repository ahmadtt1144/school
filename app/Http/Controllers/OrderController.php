<?php

namespace App\Http\Controllers;

use App\Models\Order;          
use App\Models\Product;        
use App\Models\Category;       
use App\Models\Subcategory;    
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders and related order items
        $orderItems = \App\Models\OrderItem::with('product', 'checkout')->get();
    
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
    
        return view('Admin.index', compact('orderItems', 'categories', 'subcategories', 'products'));
    }
    

    public function updateOrderStatus(Request $request, $id)
    {
        $orderItem = \App\Models\OrderItem::find($id);
    
        if (!$orderItem) {
            return response()->json(['success' => false, 'message' => 'Order not found.']);
        }
    
        $orderItem->status = $request->input('status');
        $orderItem->save();
    
        return response()->json(['success' => true, 'message' => 'Order status updated successfully.']);
    }
    
}
