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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("password");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->longText("descripcion");
            $table->string("cif");
            $table->string("img_path")->nullable();
            $table->double("precio_mp")->default(0);
            $table->double("precio_pc")->default(0);
            $table->double("precio_hd")->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('hotels');
    }
};
