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
            $table->string('razao_social')->nullabe();
            $table->string('cpf');
            $table->string('cnpj');
            $table->string('cgc')->nullabe();
            $table->string('nome_fantasia')->nullabe();
            $table->string('tipo_endereco');
            $table->string('endereco');
            $table->string('tipo_pessoa');
            $table->string('telefone')->nullabe();
            $table->string('website')->nullabe();
            $table->string('tipo_perfil');
            $table->string('mapa')->nullabe();
            $table->string('imagem_aerea')->nullabe();
            $table->string('imagem_perfil')->nullabe();
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
