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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->required();
            $table->string('autor')->required();
            $table->year('ano_publicacao')->required();
            $table->string('genero')->nullable();
            $table->integer('quantidade_paginas')->nullable();
            $table->enum('status', ['Disponível', 'Emprestado', 'Reservado'])->default('Disponível');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};