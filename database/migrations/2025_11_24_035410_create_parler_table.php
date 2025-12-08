<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parler', function (Blueprint $table) {
            $table->id();
            $table->string('audio'); // fichier mp3/wav

            $table->unsignedBigInteger('contenu_id');
            $table->foreign('contenu_id')->references('id')->on('contenus')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parler');
    }
};
