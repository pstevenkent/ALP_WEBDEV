<?php

namespace App\Http\Controllers;


use App\Models\CoffeeBean;
use App\Models\Producer;
use App\Models\Roasttype;
use App\Models\Varietal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoffeeBeanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('coffeebean.index',[
            'coffeebeans' => CoffeeBean::all(),
            'pagetitle' => 'Beans ',
            'maintitle' => 'Beans For Sale',
        ]);
    }

    public function show($id) {
        $coffeebean = CoffeeBean::findOrFail($id);
        return view('coffeebean.show', [
            'name' => 'Coffee Beans',
            'pagetitle' => 'Beans ',
            'maintitle' => 'Beans Detail',
        ], compact('coffeebean'));
    }

    public function addToCart(CoffeeBean $coffeeBean) {
        $cart = session()->get('cart', []);

        // Check if the coffee bean is already in the cart
        if (isset($cart[$coffeeBean->id])) {
            // Increment quantity if already in cart
            $cart[$coffeeBean->id]['quantity']++;
        } else {
            // Add the coffee bean to the cart
            $cart[$coffeeBean->id] = [
                'id' => $coffeeBean->id,
                'name' => $coffeeBean->name,
                'price' => $coffeeBean->price,
                'quantity' => 1,
            ];
        }

        // Update the cart in the session
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Item added to cart.');

        return redirect()->back()->with('success', 'Item added to cart.');
    }

    public function removeFromCart(CoffeeBean $coffeeBean)
    {
        $cart = session()->get('cart', []);

        // Check if the coffee bean is in the cart
        if (isset($cart[$coffeeBean->id])) {
            // Remove the coffee bean from the cart
            unset($cart[$coffeeBean->id]);

            // Update the cart in the session
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                $producers = Producer::all();
                $varietals = Varietal::all();
                $roasttypes = Roasttype::all();
                return view(
                    'coffeebean.create',
                    [
                        "pagetitle" => 'Add Beans',
                        "maintitle" => 'Add Beans Detail',
                    ],
                    compact('producers', 'varietals', 'roasttypes'),
                );
            } else {
                return redirect()->route('coffeebean.index')->with('error', 'Unauthorized access');
            }
        } else {
            return redirect()->route('coffeebean.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {

            $producer_id = (int) $request->input('producer_id');
            $varietal_id = (int) $request->input('varietal_id');
            $roasttype_id = (int) $request->input('roasttype_id');
            $imagePath = $this->uploadImage(null, $request->file('image'));

            // Create the product
            CoffeeBean::create([
                'name' => $request->input('name'),
                'image' => $imagePath,
                'origin' => $request->input('origin'),
                'process' => $request->input('process'),
                'elevation' => $request->input('elevation'),
                'notes' => $request->input('notes'),
                'description' => $request->input('description'),
                'weight' => $request->input('weight'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'availability' => $request->input('availability'),
                'producer_id' => $producer_id,
                'varietal_id' => $varietal_id,
                'roasttype_id' => $roasttype_id,
            ]);

            return redirect()->route('coffeebean.index')->with('success', 'Product created successfully');
        } else {
            return redirect()->route('coffeebean.index')->with('error', 'Unauthorized access');
        }
    }

    public function edit($id)
    {
        $coffeebean = CoffeeBean::findOrFail($id);
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            $producers = Producer::all();
            $varietals = Varietal::all();
            $roasttypes = Roasttype::all();
            return view('coffeebean.edit', [
                "pagetitle" => 'Edit Bean',
                "maintitle" => 'Edit Bean Details',
            ], compact('coffeebean', 'producers', 'varietals', 'roasttypes'));
        } else {
            return redirect()->route('coffeebean.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $coffeebean = CoffeeBean::findOrFail($id);
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            $newImagePath = $this->uploadImage($coffeebean->image, $request->file('image'));
    
            // Update the coffee bean
            $coffeebean->update([
                'name' => $request->input('name'),
                'image' => $newImagePath,
                'origin' => $request->input('origin'),
                'process' => $request->input('process'),
                'elevation' => $request->input('elevation'),
                'notes' => $request->input('notes'),
                'description' => $request->input('description'),
                'weight' => $request->input('weight'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'availability' => $request->input('availability'),
                'producer_id' => $request->input('producer_id'),
                'varietal_id' => $request->input('varietal_id'),
                'roasttype_id' => $request->input('roasttype_id'),
            ]);
    
            return redirect()->route('coffeebean.index')->with('success', 'Bean updated successfully');
        } else {
            return redirect()->route('coffeebean.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoffeeBean $coffeebean)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $coffeebean->delete();
            return redirect()->route('coffeebean.index')->with('success', 'Bean deleted successfully');
        } else {
            return redirect()->route('coffeebean.index')->with('error', 'Unauthorized access');
        }
    }

    private function uploadImage($existingImagePath = null, $newImage = null)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                // Check if a new image is provided
                if ($newImage) {
                    $imageName = time() . '.' . $newImage->getClientOriginalExtension();
                    $newImage->move(public_path('images'), $imageName);

                    // Return the relative path without the "images/" prefix
                    return $imageName;
                }

                // If no new image is provided, return the existing image path or null
                return $existingImagePath;
            } else {
                return redirect()->route('coffeebean.index')->with('error', 'Unauthorized access');
            }
        } else {
            return redirect()->route('coffeebean.index')->with('error', 'Unauthorized access');
        }
    }
}