<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

/*
|--------------------------------------------------------------------------
| Recettes
|--------------------------------------------------------------------------
*/

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('recipes/', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);
Route::put('/recipes/{recipe}', [RecipeController::class, 'update']);
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');

/*
|--------------------------------------------------------------------------
| Catégories
|--------------------------------------------------------------------------
*/

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');