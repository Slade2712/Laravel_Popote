<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'description',
        'instructions',
        'image',
        'category_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The ingredients that belong to the recipe.
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
