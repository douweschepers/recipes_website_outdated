<?php

namespace App\Http\Controllers;

use App\Mail\RecipePosted;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RecipeController extends Controller
{
	protected IngredientController $ingredientContoller;

	public function __construct(IngredientController $ingredientContoller)
	{
		$this->ingredientContoller = $ingredientContoller;
	}
	/**
     * Display a listing of the resource.
     */
    public function index()
    {
		$userID = auth()->id();
	    $recipes = Recipe::where('user_id', $userID)->latest()->simplePaginate(8);
	    return view('recipes/index', [ "recipes" => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	    $ingredients = Ingredient::query()->latest()->simplePaginate(8);

	    return view('recipes/create', ["ingredients"=>$ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//		dd($request);
	    $request->validate([
		    'title' => ['required', 'min:3'],
		    'description' => ['required'],
	    ]);

	    $recipe = Recipe::create([
		    'title' => request('title'),
		    'description' => request('description'),
		    'instructions' => request('instructions'),
		    'user_id' => auth()->id()
	    ]);

		$this->ingredientContoller->storeIngredientRecipe($request, $recipe->id);


	    // send email to the employer

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
