<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLogsAcesso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_acesso', function (Blueprint $table) {
            $table->bigIncrements('idlogs');
            $table->string('descricao', 45)->nullable();
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
        Schema::dropIfExists('logs_acesso');
    }
}
