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
            $table->string('editura');
            $table->string('nume_categorie');
            $table->string('cover');
            $table->foreign('nume_categorie')->references('nume_categorie')->on('categorie');
            $table->integer('numar_pagini', false, true);
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

            $table->foreign('cod_client')->references('id')->on('users');
            $table->foreign('isbn')->references('isbn')->on('model_carte');
            $table->integer('stele', false, true);
            $table->primary(['cod_client', 'isbn']);
            $table->timestamps();
        });
        Schema::create('istoric_imprumut', function (Blueprint $table) {
            $table->foreignId('cod_client');
            $table->foreignId('cod_stare_primita');
            $table->foreignId('cod_stare_adusa')->nullable();
            $table->string('cod_carte');

            $table->foreign('cod_carte')->references('cod_carte')->on('carte');
            $table->foreign('cod_client')->references('id')->on('users');
            $table->foreign('cod_stare_primita')->references('cod_stare')->on('stare');
            $table->foreign('cod_stare_adusa')->references('cod_stare')->on('stare');
            $table->dateTime('data_primire');
            $table->primary(['cod_client', 'data_primire', 'cod_carte']);
            $table->dateTime('data_returnare')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_carte');
        Schema::dropIfExists('stare');
        Schema::dropIfExists('carte');
        Schema::dropIfExists('recenzie');
    }
};
