<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
	    $ingredients = Ingredient::query()->latest()->simplePaginate(8);
	    return [ "ingredients" => $ingredients];
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		dd("dueze");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request)
    {
        // store the ingredient
	    $request->validate([
		    'name' => ['required'],
		    'measurement' => ['required'],
	    ]);

	    Ingredient::create([
		    'name' => request('name'),
		    'measurement' => request('measurement'),
		    'default_quantity' => request('defaultQuantity'),
	    ]);
		// only show message of creation
	    return response()->json(['message' => 'Data saved successfully!']);
	}

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }

	public function search(Request $request)
	{
		$search = $request->input('query');
		$ingredients = Ingredient::where('name', 'LIKE', "%{$search}%")
			->limit(10) // Return only 10 results
			->get();

		return response()->json($ingredients);
	}
}
