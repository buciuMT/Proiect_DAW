<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorie', function (Blueprint $table) {
            $table->string('nume_categorie')->primary();
            $table->string('descriere');
            $table->timestamps();
        });
        Schema::create('model_carte', function (Blueprint $table) {
            $table->string('isbn')->primary();
            $table->string('titlu');
            $table->string('autor');
            $table->string('editura');
            $table->string('cover')->nullable();
            $table->string('dark_cover')->nullable();
            $table->integer('numar_pagini', false, true);
            $table->integer('stele', false, true);
            $table->timestamps();
        });
        Schema::create('categorie_model_carte', function (Blueprint $table) {
            $table->id();
            $table->string('nume_categorie');
            $table->foreign('nume_categorie')->references('nume_categorie')->on('categorie');
            $table->string('isbn');
            $table->foreign('isbn')->references('isbn')->on('model_carte');
            $table->timestamps();
        });
        Schema::create('stare', function (Blueprint $table) {
            $table->id('cod_stare');
            $table->string('nume');
            $table->string('descriere');
            $table->timestamps();
        });
        Schema::create('carte', function (Blueprint $table) {
            $table->id('cod_carte');
            $table->string('isbn');
            $table->foreignId('cod_stare');
            $table->foreign('isbn')->references('isbn')->on('model_carte');
            $table->foreign('cod_stare')->references('cod_stare')->on('stare');
            $table->timestamps();
        });
        Schema::create('recenzie', function (Blueprint $table) {
            $table->foreignId('cod_client');
            $table->string('isbn');
            $table->string('continut');
            $table->foreign('cod_client')->references('id')->on('users');
            $table->foreign('isbn')->references('isbn')->on('model_carte');
            $table->primary(['cod_client', 'isbn']);
            $table->timestamps();
        });

        Schema::create('lista', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user')->on('users');
            $table->timestamp('aprobat')->nullable();
            $table->foreignId('aprobat_de')->nullable();
            $table->timestamp('return')->nullable();
        });
        Schema::create('lista_carte', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_lista')->constrained('lista');
            $table->string('model_carte')->nullable();
            $table->foreign('model_carte')->references('isbn')->on('model_carte');
            $table->foreignId('carte')->nullable()->constrained('carte', 'cod_carte');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('favorite')->nullable()->constrained()->references('id')->on('lista');
            $table->foreignId('cart')->nullable()->constrained()->references('id')->on('lista');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_carte');
        Schema::dropIfExists('stare');
        Schema::dropIfExists('model_carte');
        Schema::dropIfExists('carte');
        Schema::dropIfExists('recenzie');
        Schema::dropIfExists('lista');
        Schema::dropIfExists('lista_carte');
    }
};
