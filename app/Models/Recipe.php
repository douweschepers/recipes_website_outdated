<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
	use HasFactory;
//	protected $fillable = ['title', 'description', 'instructions', 'user_id'];
	protected $guarded =[];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
	public function ingredients(): BelongsToMany
	{
		return $this->belongsToMany(Ingredient::class);
	}
}
