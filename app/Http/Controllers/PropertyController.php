<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{

    public function index(){
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    public function create(){
        return view('properties.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
        ]);

        \App\Models\Property::create($validated);

        return redirect('/properties')->with('success', 'Propriété ajoutée avec succès !');
    }

}
