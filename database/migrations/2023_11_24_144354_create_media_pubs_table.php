<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaPubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_pubs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pubs_id')->unsigned();
            $table->string('imageSpot')->nullable();
            $table->string('videoSpot')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
            $table->foreign('pubs_id')->references('id')->on('pubs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_pubs');
    }
}
