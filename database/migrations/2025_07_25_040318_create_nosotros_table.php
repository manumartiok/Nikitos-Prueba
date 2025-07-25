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
        Schema::create('nosotros', function (Blueprint $table) {
            $table->id();
            $table->string('foto1')->nullable();
            $table->string('texto1')->nullable();
            $table->text('descripcion1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('texto2')->nullable();
            $table->text('descripcion2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('texto3')->nullable();
            $table->text('descripcion3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('texto4')->nullable();
            $table->text('descripcion4')->nullable();
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
        Schema::dropIfExists('nosotros');
    }
};
