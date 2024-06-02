<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('producer.index',[
            'producers' => Producer::all(),
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
                'producer.create',
                [
                    "pagetitle" => 'Add Producer',
                    "maintitle" => 'Add New Producer',
                ],
            );
        } else {
            return redirect()->route('producer.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {

            Producer::create([
                'name' => $request->input('name'),
            ]);
    
            return redirect()->route('producer.index')->with('success', 'Producer created successfully');
        } else {
            return redirect()->route('producer.index')->with('error', 'Unauthorized access');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Producer $producer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $varietal = Producer::findOrFail($id);
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            return view('producer.edit', [
                "pagetitle" => 'Edit Producer',
                "maintitle" => 'Producer',
            ], compact('producer'));
        } else {
            return redirect()->route('producer.index')->with('error', 'Unauthorized access');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producer = Producer::findOrFail($id);
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            $producer->update([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('producer.index')->with('success', 'Producer updated successfully');
        } else {
            return redirect()->route('producer.index')->with('error', 'Unauthorized access');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producer $producer)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $producer->delete();
            return redirect()->route('producer.index')->with('success', 'Producer deleted successfully');
        } else {
            return redirect()->route('producer.index')->with('error', 'Unauthorized access');
        }
    }
}
