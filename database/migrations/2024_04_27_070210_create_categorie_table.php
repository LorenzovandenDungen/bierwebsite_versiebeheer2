<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorie', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->timestamps();
        });

        // Voeg categorieën toe
        DB::table('categorie')->insert([
            ['naam' => 'Pils'],
            ['naam' => 'Alcoholvrij'],
            ['naam' => 'Blond'],
            ['naam' => 'Radler'],
            ['naam' => 'Dubbel'],
            ['naam' => 'Lager'],
            ['naam' => 'Bok'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorie');
    }
}
