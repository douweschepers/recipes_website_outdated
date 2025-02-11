<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	// Show all recipes
	Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

	// Show individual recipe details
	Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipe.show');
	// create new recipe
	Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe.create');

	// Store new recipe
	Route::post('/recipe', [RecipeController::class, 'store'])->name('recipe.store');
});


Route::middleware('auth')->group(function () {
	Route::post('/ingredient', [IngredientController::class, 'store'])->name('ingredient.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
