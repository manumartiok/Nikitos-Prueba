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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('producto_titulo')->nullable();
            $table->string('producto_foto')->nullable();
            $table->string('ubicacion_titulo')->nullable();
            $table->string('ubicacion_foto')->nullable();
            $table->string('recetas_titulo')->nullable();
            $table->string('recetas_foto')->nullable();
            $table->string('nosotros_titulo')->nullable();
            $table->string('nosotros_foto')->nullable();
            $table->string('contacto_titulo')->nullable();
            $table->string('contacto_foto')->nullable();
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
        Schema::dropIfExists('banners');
    }
};
