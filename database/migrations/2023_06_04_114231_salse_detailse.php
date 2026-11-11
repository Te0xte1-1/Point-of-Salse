<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salse_detailse', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedInteger('salse_id');
            $table->integer('category_id');
            $table->integer('product_id');
            $table->integer('price');
            $table->integer('QTY');
            $table->integer('sub_total');
            // $table->foreign('salse_id')->references('id')->on('salse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salse_detailse');
    }
};
