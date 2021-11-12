<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('idenderecos');
            $table->string('logradouro', 100);
            $table->string('numero', 5);
            $table->string('complemento', 45)->nullable();
            $table->string('bairro', 45);
            $table->string('cep', 8);
            $table->string('cidade', 45);
            $table->string('uf', 2);
            $table->string('enderecocol', 45)->nullable();
            $table->unsignedBigInteger('usuarios_idusuarios');
            $table->unsignedBigInteger('usuarios_idclientes');

            $table->timestamps();

            $table->foreign('usuarios_idusuarios')->references('idusuarios')->on('users');
            $table->foreign('usuarios_idclientes')->references('idclientes')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
