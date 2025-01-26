<?php

namespace App\Http\Controllers;

use App\Mail\RecipePosted;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

	    return view('recipes/index', [ "recipes" => Recipe::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('recipes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
	    $request->validate([
		    'title' => ['required', 'min:3'],
		    'description' => ['required'],
	    ]);

	    Recipe::create([
		    'title' => request('title'),
		    'description' => request('description'),

	    ]);

//	    Mail::to($recipe->employer->user)->queue(
//		    new RecipePosted($recipe)
//	    );

	    return redirect()->route('recipes.index')->with('message', 'recipe Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
	    return view('recipes/show', [ "recipe" => $recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
