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
        Schema::create('preparacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recetas_id')->nullable();
            $table->foreign('recetas_id')->references('id')->on('recetas')->onDelete('cascade');
            $table->string('nro_paso')->nullable();;
            $table->text('texto_paso')->nullable();;
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
        Schema::dropIfExists('preparacions');
    }
};
