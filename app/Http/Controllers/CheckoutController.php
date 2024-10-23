<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        $subtotal = $cartItems->sum('subtotal');

        $total = $subtotal;

        return view('checkout.index', compact('cartItems', 'subtotal', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'country' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);
    
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
        
        $orderNo = 'Order-' . date('Y') . '-' . str_pad(Checkout::count() + 1, 3, '0', STR_PAD_LEFT);
    
        $checkout = new Checkout();
        $checkout->user_id = $userId;
        $checkout->email = $request->email;
        $checkout->country = $request->country;
        $checkout->first_name = $request->first_name;
        $checkout->last_name = $request->last_name;
        $checkout->address = $request->address;
        $checkout->city = $request->city;
        $checkout->postal_code = $request->postal_code;
        $checkout->phone = $request->phone;
        $checkout->order_no = $orderNo;
        $checkout->save();
    
        // Store each cart item as an order item
        foreach ($cartItems as $cartItem) {
            \App\Models\OrderItem::create([
                'user_id' => $userId,
                'product_id' => $cartItem->product->id,
                'checkout_id' => $checkout->id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
                'status' => 'Pending',  
            ]);
        }
    
        // Clear the cart
        Cart::where('user_id', $userId)->delete();
    
        return redirect()->route('checkout.success', ['order_no' => $orderNo]);
    }
    
    public function success(Request $request) 
    {
        // Retrieve the order number from the request
        $orderNo = $request->query('order_no');

        // Fetch the latest checkout details for the authenticated user
        $checkout = Checkout::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();

        return view('checkout.success', compact('checkout', 'orderNo')); 
    }
}
