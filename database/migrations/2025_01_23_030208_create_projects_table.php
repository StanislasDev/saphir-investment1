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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();   
            $table->string('title'); // titre du projet
            $table->text('description'); // description du projet en texte long
            $table->string('category'); //Catégorie, ex. : Immobilier, Technologie
            $table->decimal('goal_amount', 15, 2); //montant total requis
            $table->decimal('collected_amount', 15, 2)->default(0); //Montant collecté
            $table->date('start_date'); //Date de début de collecte
            $table->date('end_date'); //Date limite pour investir
            $table->decimal('return_rate', 5, 2); //Taux de retour sur investissement
            $table->enum('status', ['en cours', 'terminé', 'annulé'])->default('en cours'); // en cours, terminé, annulé
            $table->string('image')->nullable(); // Colonne pour l'image du projet, facultative
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
