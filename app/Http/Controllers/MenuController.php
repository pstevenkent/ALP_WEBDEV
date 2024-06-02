<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('menu.index',[
            'menus' => Menu::all(),
            'pagetitle' => 'Menu',
            'maintitle' => 'Drinks Menu',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $categories = Category::all(); // Adjust based on your Category model
            return view(
                'menu.create',
                [
                    "pagetitle" => 'Add Menu Item',
                    "maintitle" => 'Add New Menu Item',
                ],
                compact('categories')
            );
        } else {
            return redirect()->route('menu.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {

            $category_id = (int) $request->input('category_id');

            Menu::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'category_id' => $category_id,
                // Include any other fields
            ]);
    
            return redirect()->route('menu.index')->with('success', 'Menu item created successfully');
        } else {
            return redirect()->route('menu.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            $categories = Category::all(); // Assuming you have a Category model
            return view('menu.edit', [
                "pagetitle" => 'Edit Menu Item',
                "maintitle" => 'Edit Menu Item Details',
            ], compact('menu', 'categories'));
        } else {
            return redirect()->route('menu.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            $menu->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                // Include any other fields
            ]);

            return redirect()->route('menu.index')->with('success', 'Menu item updated successfully');
        } else {
            return redirect()->route('menu.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $menu->delete();
            return redirect()->route('menu.index')->with('success', 'Menu item deleted successfully');
        } else {
            return redirect()->route('menu.index')->with('error', 'Unauthorized access');
        }
    }
}