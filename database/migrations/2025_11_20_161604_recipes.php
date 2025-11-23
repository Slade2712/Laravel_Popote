<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');                                            // Nom de la recette
            $table->text('description')->nullable();                            // Optionnel
            $table->longText('instructions');                                   // Instructions de préparation
            $table->string('image')->nullable();                                // Image optionnelle
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete()->nullOnDelete(); // Lien vers category
            $table->timestamps();                                               // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
