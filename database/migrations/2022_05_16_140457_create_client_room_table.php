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
        Schema::create('client_room', function (Blueprint $table) {
            $table->foreignId("room_id")->constrained();
            $table->foreignId("client_id")->constrained();
            $table->unique(['room_id', 'client_id'], 'claves_ajenas');
            $table->integer("id")->autoIncrement();
            $table->double("precio");
            $table->string("tipo_pension");
            $table->date("fecha");
            $table->integer("num_noches");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_rooms');
    }
};
