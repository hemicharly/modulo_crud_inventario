<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //codigoProduto, descricaoProduto, qtdeProduto, precoProduto
        Schema::create('inventarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('codigoProduto');
            $table->string('descricaoProduto');
            $table->integer('qtdeProduto');
            $table->float('precoProduto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
