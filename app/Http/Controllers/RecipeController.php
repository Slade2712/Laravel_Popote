<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::orderBy('name')->get();
        return view('recipes.create', compact('categories', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'ingredients' => 'nullable|array', 
            'ingredients.*' => 'exists:ingredients,id',
            'quantities' => 'nullable|array',
            'quantities.*' => 'nullable|string|max:100'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('recipes', 'public');
        }
        
        $recipe = Recipe::create($validated);

        $ingredientsToAttach = [];
        if (!empty($validated['ingredients'])) {
            foreach ($validated['ingredients'] as $ingredientId) {
                $ingredientsToAttach[$ingredientId] = ['quantity' => $validated['quantities'][$ingredientId] ?? ''];
            }
        }
        $recipe->ingredients()->attach($ingredientsToAttach);

        return redirect()->route('recipes.show', $recipe->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        $ingredients = Ingredient::orderBy('name')->get();

        return view('recipes.edit', compact('recipe', 'categories', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        // 1. Valider les données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // Max 2MB
            'ingredients' => 'nullable|array',
            'ingredients.*' => 'exists:ingredients,id',
            'quantities' => 'nullable|array',
        ]);

        // 2. Gestion de l'image (Si une nouvelle est envoyée)
        if ($request->hasFile('image')) {
            // Important : On supprime l'ancienne image pour ne pas encombrer le serveur
            if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
                Storage::disk('public')->delete($recipe->image);
            }
            // On stocke la nouvelle et on met à jour le chemin dans le tableau validé
            $validated['image'] = $request->file('image')->store('recipes', 'public');
        }

        // 3. Mise à jour des infos principales (Titre, Desc, etc.)
        $recipe->update($validated);

        // 4. Mise à jour des ingrédients et quantités (Table Pivot)
        $ingredientsData = [];
        if (!empty($validated['ingredients'])) {
            foreach ($validated['ingredients'] as $id) {
                // On associe l'ID de l'ingrédient à sa quantité correspondante
                $ingredientsData[$id] = [
                    'quantity' => $validated['quantities'][$id] ?? null
                ];
            }
        }
        // 'sync' est magique : il ajoute les nouveaux, supprime les anciens et met à jour les existants
        $recipe->ingredients()->sync($ingredientsData);

        // 5. Redirection
        return redirect(route('recipes.show', $recipe->id))->with('success', 'La recette a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect('/recipes')->with('success', 'Supprimer');
    }
}
