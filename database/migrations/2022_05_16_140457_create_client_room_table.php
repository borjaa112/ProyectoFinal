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
            $table->foreignId("room_id")->nullable()->constrained()->nullOnDelete();
            $table->foreignId("client_id")->constrained();
            $table->integer("id")->autoIncrement();
            $table->unique(['room_id', 'client_id', "id"], 'claves_ajenas');
            $table->double("precio");
            $table->string("tipo_pension");
            $table->date("fecha_entrada");
            $table->date("fecha_salida");
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
