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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_productos_id')->nullable();
            $table->foreign('categoria_productos_id')->references('id')->on('categoria_productos')->onDelete('cascade');
            $table->string('producto_nombre')->nullable();;
            $table->string('producto_foto')->nullable();;
            $table->string('producto_descripcion')->nullable();;
            $table->string('producto_codigo')->nullable();;
            $table->string('producto_tamaños')->nullable();;
            $table->string('producto_vida')->nullable();;
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('productos');
    }
};
