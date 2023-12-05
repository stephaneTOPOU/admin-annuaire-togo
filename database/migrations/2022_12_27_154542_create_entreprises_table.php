<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('souscategorie_id')->unsigned();
            $table->string('nom')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('adresse')->nullable();
            $table->string('statu')->nullable();
            $table->string('telephone1')->nullable();
            $table->string('telephone2')->nullable();
            $table->string('telephone3')->nullable();
            $table->string('telephone4')->nullable();
            $table->string('itineraire')->nullable();
            $table->string('siteweb')->nullable();
            $table->string('geolocalisation')->nullable();
            $table->string('descriptionCourte')->nullable();
            $table->string('descriptionLonge')->nullable();
            $table->string('logo')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->boolean('est_pharmacie')->default(0);
            $table->boolean('pharmacie_de_garde')->default(0);
            $table->boolean('honneur')->default(0);
            $table->boolean('est_souscrit')->default(0);
            $table->boolean('elus')->default(0);
            $table->bigInteger('vue')->default(0);
            $table->boolean('a_publireportage')->default(0);
            $table->string('publireportage1')->nullable();
            $table->string('publireportage2')->nullable();
            $table->string('publireportage3')->nullable();
            $table->string('publireportage4')->nullable();
            $table->string('publireportage5')->nullable();
            $table->string('publireportage6')->nullable();
            $table->boolean('a_magazine')->default(0);
            $table->string('magazineimage1')->nullable();
            $table->string('magazineimage2')->nullable();
            $table->string('magazineimage3')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->timestamps();
            $table->foreign('souscategorie_id')->references('id')->on('sous_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
