<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTelefones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->bigIncrements('idtelefones');
            $table->string('ddd', 2);
            $table->string('fone', 9);
            $table->string('tipo', 45)->nullable();
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
        Schema::dropIfExists('telefones');
    }
}
