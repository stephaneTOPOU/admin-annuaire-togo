<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaysSliderLateral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('slider_laterals', function (Blueprint $table) {
            $table->bigInteger('pays_id')->unsigned()->nullable();
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slider_laterals', function (Blueprint $table) {
            $table->dropColumn('pays_id');
        });
    }
}
