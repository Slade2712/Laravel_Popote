<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The recipes that belong to the ingredient.
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class)
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
