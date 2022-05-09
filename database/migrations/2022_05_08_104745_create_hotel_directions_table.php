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
        Schema::create('hotel_directions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("hotel_id")->constrained();
            $table->string("calle");
            $table->string("patio");
            $table->string("puerta");
            $table->integer("cod_postal");
            $table->string("pais");
            $table->string("provincia");
            $table->string("ciudad");
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
        Schema::dropIfExists('hotel_directions');
    }
};
