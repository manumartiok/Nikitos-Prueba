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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

        // ID del trabajador que hizo el pedido
        $table->unsignedBigInteger('nikito_user_id');
        $table->foreign('nikito_user_id')->references('id')->on('nikito_users')->onDelete('cascade');

        // Datos del pedido
        $table->date('fecha_pedido'); // Fecha que el trabajador elige (puede ser distinta a created_at)
        $table->string('localidad');
        $table->string('razon_social');
        $table->string('codigo_cliente');
        $table->text('observaciones')->nullable();
        $table->string('archivo')->nullable();

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
        Schema::dropIfExists('pedidos');
    }
};
