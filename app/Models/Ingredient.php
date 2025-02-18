<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientFactory> */
    use HasFactory;
	protected $fillable = ['name', 'measurement', 'default_quantity'];
	public function recipe() : BelongsToMany
	{
		return $this->belongsToMany(Recipe::class)->withPivot('quantity')->withTimestamps();
	}
}
