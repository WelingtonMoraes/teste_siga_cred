<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('idclientes');
            $table->string('nome', 45);
            $table->string('cpf', 14);
            $table->string('tipo', 1);
            $table->timestamp('dtnasc');
            $table->unsignedBigInteger('usuarios_idusuarios');

            $table->timestamps();

            $table->foreign('usuarios_idusuarios')->references('idusuarios')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
