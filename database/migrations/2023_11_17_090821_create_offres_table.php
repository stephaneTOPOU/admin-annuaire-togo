<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('entreprise')->nullable();
            $table->string('site')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('telephone')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->longText('titre')->nullable();
            $table->string('slug_offres')->unique();
            $table->longText('description')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('profil')->nullable();
            $table->longText('dossier')->nullable();
            $table->longText('lien')->nullable();
            $table->string('lieu')->nullable();
            $table->string('ville')->nullable();
            $table->string('description_courte')->nullable();
            $table->string('categorie')->nullable();
            $table->date('date_lim')->nullable();
            $table->boolean('valide')->default(0);
            $table->string('libelle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offres');
    }
}
