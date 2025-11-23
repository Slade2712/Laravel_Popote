<?php

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Recettes
|--------------------------------------------------------------------------
*/

// Liste des recettes
Route::get('/recipes', function() {
    $recipes = Recipe::all();
    return view('recipes.index', compact('recipes'));
})->name('recipes.index');

// Formulaire de création
Route::get('/recipes/create', function() {
    $categories = Category::all();
    return view('recipes.create', compact('categories'));
})->name('recipes.create');

// Stockage d'une nouvelle recette
Route::post('/recipes', function(Request $request) {
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'instructions' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048', // max 2MB
    ]);

    if ($request->hasFile('image')) {
        // Stockage dans storage/app/public/recipes
        $data['image'] = $request->file('image')->store('recipes', 'public');
    }

    $recipe = Recipe::create($data);

    return redirect()->route('recipes.show', $recipe->id);
})->name('recipes.store');

// Affichage d'une recette spécifique
Route::get('/recipes/{id}', function($id) {
    $recipe = Recipe::findOrFail($id);
    return view('recipes.show', compact('recipe'));
})->name('recipes.show');

/*
|--------------------------------------------------------------------------
| Catégories
|--------------------------------------------------------------------------
*/

// Liste des catégories
Route::get('/categories', function() {
    $categories = Category::all();
    return view('categories.index', compact('categories'));
})->name('categories.index');

// Affichage d'une catégorie spécifique avec ses recettes
Route::get('/categories/{id}', function($id) {
    $category = Category::findOrFail($id);
    return view('categories.show', compact('category'));
})->name('categories.show');
