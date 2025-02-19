<?php

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
			$table->text('name');
	        $table->enum('measurement',['grams','milliliters','pieces','tablespoons','teaspoons']);
			$table->float('default_quantity')->default(1.0);
            $table->timestamps();
        });
	    Schema::create('ingredient_recipe', function (Blueprint $table) {
		    $table->id();
		    $table->foreignIdFor(Recipe::class)->constrained()->cascadeOnDelete();
		    $table->foreignIdFor(Ingredient::class)->constrained()->cascadeOnDelete();
		    $table->float('quantity');
		    $table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
		Schema::dropIfExists('ingredient_recipe');
    }
};
