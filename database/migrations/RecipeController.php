<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Affiche le formulaire de création de recette.
     */
    public function create()
    {
        // On récupère tous les ingrédients et catégories pour les passer à la vue
        $ingredients = Ingredient::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        // On retourne la vue du formulaire
        return view('recipes.create', compact('ingredients', 'categories'));
    }

    /**
     * Enregistre une nouvelle recette dans la base de données.
     */
    public function store(Request $request)
    {
        // 1. Validation des données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'required|array',
            'ingredients.*.id' => 'required|exists:ingredients,id',
            'ingredients.*.quantity' => 'required|string|max:255',
        ]);

        // 2. Création de la recette
        $recipe = Recipe::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'instructions' => $validated['instructions'],
            'category_id' => $validated['category_id'],
        ]);

        // 3. Préparation des données pour la table pivot
        $ingredientsToSync = [];
        foreach ($validated['ingredients'] as $ingredientData) {
            // On vérifie que l'id et la quantité sont bien présents
            if (isset($ingredientData['id']) && isset($ingredientData['quantity'])) {
                // Le format doit être : [id_ingredient => ['quantity' => 'valeur']]
                $ingredientsToSync[$ingredientData['id']] = ['quantity' => $ingredientData['quantity']];
            }
        }

        // 4. Association des ingrédients à la recette
        if (!empty($ingredientsToSync)) {
            $recipe->ingredients()->sync($ingredientsToSync);
        }

        // 5. Redirection vers la page de la recette créée avec un message de succès
        return redirect()->route('recipes.show', $recipe)->with('success', 'Recette créée avec succès !');
    }

    /**
     * Affiche une recette spécifique.
     */
    public function show(Recipe $recipe)
    {
        // 'with' charge les relations en même temps pour optimiser les requêtes
        $recipe->load('category', 'ingredients');

        // Pour l'instant, on va juste afficher un message simple.
        // Plus tard, vous créerez une vue 'recipes.show'
        $output = "<h1>{$recipe->title}</h1>";
        $output .= "<h2>Ingrédients :</h2><ul>";
        foreach ($recipe->ingredients as $ingredient) {
            $output .= "<li>{$ingredient->name} - <strong>{$ingredient->pivot->quantity}</strong></li>";
        }
        $output .= "</ul>";

        return $output;
    }
}
