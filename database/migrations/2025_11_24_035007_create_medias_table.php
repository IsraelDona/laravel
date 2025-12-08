<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->id();

            $table->string('fichier');      // chemin du fichier
            $table->string('titre')->nullable();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('type_media_id');
            $table->unsignedBigInteger('contenu_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();

            $table->foreign('type_media_id')->references('id')->on('type_medias')->onDelete('cascade');
            $table->foreign('contenu_id')->references('id')->on('contenus')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
