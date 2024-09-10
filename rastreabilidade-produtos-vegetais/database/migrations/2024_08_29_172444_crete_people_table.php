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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('razao_social')->nullable();
            $table->string('cpf');
            $table->string('cnpj');
            $table->string('cgc')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('tipo_endereco');
            $table->string('endereco');
            $table->string('tipo_pessoa');
            $table->string('telefone')->nullable();
            $table->string('website')->nullable();
            $table->string('tipo_perfil');
            $table->string('mapa')->nullable();
            $table->string('imagem_aerea')->nullable();
            $table->string('imagem_perfil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
