<?php

use App\Models\Recipe;
use App\Models\Ingredient;
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
    $ingredients = Ingredient::orderBy('name')->get(); // On récupère les ingrédients
    return view('recipes.create', compact('categories', 'ingredients')); // On les passe à la vue
})->name('recipes.create');

// Stockage d'une nouvelle recette
Route::post('/recipes', function(Request $request) {
    // 1. Valider toutes les données, y compris les ingrédients
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'instructions' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048', // max 2MB
        'ingredients' => 'nullable|array', // Doit être un tableau
        'ingredients.*' => 'exists:ingredients,id', // Chaque valeur doit exister dans la table ingredients
        'quantities' => 'nullable|array',
        'quantities.*' => 'nullable|string|max:100' // Chaque quantité est une chaîne de texte
    ]);

    // 2. Gérer l'upload de l'image
    if ($request->hasFile('image')) {
        // Stockage dans storage/app/public/recipes
        $validated['image'] = $request->file('image')->store('recipes', 'public');
    }
    
    // 3. Créer la recette et attacher les ingrédients
    $recipe = Recipe::create($validated);

    // 4. Préparer les données pour la table pivot (avec les quantités)
    $ingredientsToAttach = [];
    if (!empty($validated['ingredients'])) {
        foreach ($validated['ingredients'] as $ingredientId) {
            // On associe l'ID de l'ingrédient avec sa quantité
            $ingredientsToAttach[$ingredientId] = ['quantity' => $validated['quantities'][$ingredientId] ?? ''];
        }
    }
    $recipe->ingredients()->attach($ingredientsToAttach);

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
