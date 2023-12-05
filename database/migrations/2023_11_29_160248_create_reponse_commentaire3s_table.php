<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponseCommentaire3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_commentaire3s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('commentaires_id')->unsigned()->nullable();
            $table->string('nomR')->nullable();
            $table->longText('messageR')->nullable();
            $table->foreign('commentaires_id')->references('id')->on('commentaire_blogs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reponse_commentaire3s');
    }
}
