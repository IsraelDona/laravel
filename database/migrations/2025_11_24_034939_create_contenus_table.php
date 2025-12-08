<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contenus', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 255);
            $table->text('description')->nullable();
            $table->text('contenu_html')->nullable(); // pour du texte riche

            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('type_contenu_id');
            $table->unsignedBigInteger('langue_id');
            $table->unsignedBigInteger('user_id'); // auteur

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('type_contenu_id')->references('id')->on('type_contenus')->onDelete('cascade');
            $table->foreign('langue_id')->references('id')->on('langues')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contenus');
    }
};
