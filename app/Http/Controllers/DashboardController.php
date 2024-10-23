<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch orders and related order items
        $orderItems = OrderItem::with('product', 'checkout')->get();
    
        return view('dashboard', compact('orderItems'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        // Find the order item by ID
        $orderItem = \App\Models\OrderItem::find($id);
    
        if (!$orderItem) {
            return redirect()->back()->with('error', 'Order not found.');
        }
    
        $orderItem->status = $request->input('status');
        $orderItem->save();
    
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
    
}
