<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentaireAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaire_annonces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('annonce_id')->unsigned();
            $table->string('pseudo')->nullable();
            $table->longText('commentaire')->nullable();
            $table->foreign('annonce_id')->references('id')->on('annonces')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('commentaire_annonces');
    }
}
