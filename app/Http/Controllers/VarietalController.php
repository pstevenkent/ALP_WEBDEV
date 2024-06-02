<?php

namespace App\Http\Controllers;

use App\Models\Varietal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VarietalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('varietal.index',[
            'varietals' => Varietal::all(),
            'pagetitle' => 'Varietals',
            'maintitle' => 'Varietals',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return view(
                'varietal.create',
                [
                    "pagetitle" => 'Add Varietal',
                    "maintitle" => 'Add New Varietal',
                ],
            );
        } else {
            return redirect()->route('varietal.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {

            Varietal::create([
                'name' => $request->input('name'),
            ]);
    
            return redirect()->route('varietal.index')->with('success', 'Varietal created successfully');
        } else {
            return redirect()->route('varietal.index')->with('error', 'Unauthorized access');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Varietal $varietal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $varietal = Varietal::findOrFail($id);
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            return view('varietal.edit', [
                "pagetitle" => 'Edit Varietal',
                "maintitle" => 'Varietal',
            ], compact('varietal'));
        } else {
            return redirect()->route('varietal.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $varietal = Varietal::findOrFail($id);
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            $varietal->update([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('varietal.index')->with('success', 'Varietal updated successfully');
        } else {
            return redirect()->route('varietal.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Varietal $varietal)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $varietal->delete();
            return redirect()->route('varietal.index')->with('success', 'Varietal deleted successfully');
        } else {
            return redirect()->route('varietal.index')->with('error', 'Unauthorized access');
        }
    }
}
