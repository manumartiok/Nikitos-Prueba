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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('video')->nullable();
            $table->string('video_tmayor')->nullable();
            $table->text('video_tmenor')->nullable();
            $table->string('banner_foto')->nullable();
            $table->string('banner_tmayor')->nullable();
            $table->text('banner_tmenor')->nullable();
            $table->string('titulo1')->nullable();
            $table->string('titulo2')->nullable();
            $table->string('titulo3')->nullable();
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
        Schema::dropIfExists('homes');
    }
};
