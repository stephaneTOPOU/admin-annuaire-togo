<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->longText('description1')->nullable();
            $table->string('image1')->nullable();
            $table->longText('description2')->nullable();
            $table->string('image2')->nullable();
            $table->longText('description3')->nullable();
            $table->string('image3')->nullable();
            $table->longText('description4')->nullable();
            $table->string('video1')->nullable();
            $table->longText('description5')->nullable();
            $table->string('video2')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
