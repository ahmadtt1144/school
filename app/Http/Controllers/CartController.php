<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart; // Ensure the Cart model is imported
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
        } else {
            
            $cartItem = new Cart();
            $cartItem->user_id = Auth::id();
            $cartItem->product_id = $product->id;
            $cartItem->quantity = $request->quantity;
        }

        $cartItem->subtotal = $cartItem->quantity * $product->price;
        $cartItem->save();

        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        $totalItems = $cartItems->sum('quantity');

        return response()->json([
            'success' => true,
            'cartItems' => view('partials.cart-items', compact('cartItems'))->render(),
            'totalItems' => $totalItems,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        
        $cartItem->quantity = $request->quantity;
        $cartItem->subtotal = $cartItem->quantity * $cartItem->product->price;
        $cartItem->save();
    
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }
    
    public function destroy($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $cartItem->delete();
    
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
    
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
       
        $totalItems = $cartItems->sum('quantity');

        return view('cart.index', compact('cartItems', 'totalItems')); 
    }
}
