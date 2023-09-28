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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80)->unique()->nullable(false);
            $table->string('celular', 200)->nullable(true);
            $table->string('email',)->unique()->nullable(false);
            $table->string('cpf',)->unique()->nullable(false);
            $table->string('dataDeNascimento')->nullable(false);
            $table->string('cidade',)->nullable(false);
            $table->string('estado',)->nullable(false);
            $table->string('pais',)->nullable(false);
            $table->string('rua',)->nullable(false);
            $table->string('numero',)->nullable(false);
            $table->string('bairro',)->nullable(false);
            $table->string('cep',)->nullable(false);
            $table->string('complemento',)->nullable(false);
            $table->string('senha',)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
