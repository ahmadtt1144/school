<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    public function trackOrder(Request $request)
    {
        $validatedData = $request->validate([
            'order_number' => 'required|exists:checkouts,order_no',
        ]);
    
        
        $checkout = Checkout::with('orderItems')->where('order_no', $validatedData['order_number'])->first();
    
        if ($checkout) {
            // Calculate the subtotal
            $subtotal = $checkout->orderItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
    
            
            return view('track-order.details', [
                'checkout' => $checkout,
                'orderItems' => $checkout->orderItems,
                'subtotal' => $subtotal, 
            ]);
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }
    }
    

    public function index()
{
    return view('track-order.index'); 
}

    
}



