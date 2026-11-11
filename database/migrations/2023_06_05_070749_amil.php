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
        Schema::create('amil', function (Blueprint $table) {
            $table->id();
            $table->string('amil_name');
            $table->string('amil_address')->nullable();
            $table->string('amil_phone')->nullable();
            $table->string('amil_imge')->nullable();
            $table->string('amil_email')->nullable();
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
        Schema::dropIfExists('amil');
    }
};
