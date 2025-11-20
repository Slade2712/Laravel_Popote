<?php

use App\Models\Project;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/recipes', function() {
    $recipes = Recipe::all();
    return view('recipes.index', compact('recipes'));
})->name('recipes.index');

Route::get('/recipes/create', function() {
    $categories = Category::all();
    return view('recipes.create', compact('categories'));
})->name('recipes.create');

Route::post('/recipes', function(\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'instructions' => 'required',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('recipes', 'public');
    }

    Recipe::create($data);

    return redirect()->route('recipes.index');
})->name('recipes.store');

Route::get('/recipes/{id}', function($id) {
    $recipe = Recipe::findOrFail($id);
    return view('recipes.show', compact('recipe'));
})->name('recipes.show');

/*
|--------------------------------------------------------------------------
| Catégories
|--------------------------------------------------------------------------
*/
Route::get('/categories', function() {
    $categories = Category::all();
    return view('categories.index', compact('categories'));
})->name('categories.index');

Route::get('/categories/{id}', function($id) {
    $category = Category::findOrFail($id);
    return view('categories.show', compact('category'));
})->name('categories.show');
