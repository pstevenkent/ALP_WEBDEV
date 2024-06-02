<?php

namespace App\Http\Controllers;

use App\Models\CoffeeBean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Show the contents of the cart.
     */
    public function show()
    {
        $cart = Session::get('cart', []);

        return view('cart', [
            'cartItems' => $cart,
            'pagetitle' => 'Shopping Cart',
            'maintitle' => 'Your Shopping Cart',
        ]);
    }

    /**
     * Add a coffee bean to the cart.
     */
    public function addToCart(CoffeeBean $coffeeBean)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$coffeeBean->id])) {
            $cart[$coffeeBean->id]['quantity']++;
        } else {
            $cart[$coffeeBean->id] = [
                'id' => $coffeeBean->id,
                'name' => $coffeeBean->name,
                'price' => $coffeeBean->price,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Item added to cart.');
    }

    /**
     * Remove a coffee bean from the cart.
     */
    public function removeFromCart($index)
    {
        $cart = Session::get('cart', []);
    
        if (isset($cart[$index])) {
            unset($cart[$index]);
            Session::put('cart', $cart);
    
            return redirect()->back()->with('success', 'Item removed from cart successfully!');
        }
    
        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    /**
     * Update the quantity of a coffee bean in the cart.
     */
    public function updateCartQuantity(Request $request)
    {
        $index = $request->input('index');
        $action = $request->input('action');
        
        $cart = Session::get('cart', []);

        if (isset($cart[$index])) {
            switch ($action) {
                case 'increase':
                    $cart[$index]['quantity']++;
                    break;
                case 'decrease':
                    if ($cart[$index]['quantity'] > 1) {
                        $cart[$index]['quantity']--;
                    }
                    break;
            }

            Session::put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Cart updated successfully.');
    }
}
