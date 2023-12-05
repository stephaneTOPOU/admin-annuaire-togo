<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponseCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_commentaires', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('commentaires_id')->unsigned()->nullable();
            $table->string('nomR')->nullable();
            $table->string('emailR')->nullable();
            $table->longText('messageR')->nullable();
            $table->foreign('commentaires_id')->references('id')->on('commentaires')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reponse_commentaires');
    }
}
