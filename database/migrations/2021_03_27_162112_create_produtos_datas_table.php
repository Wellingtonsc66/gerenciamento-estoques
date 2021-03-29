<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_datas', function (Blueprint $table) {
            $table->id('produto_data_id');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('produto_id');
            $table->integer('produto_data_qnt');
            $table->dateTime('produto_data_data');

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produto_id')->references('produto_id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_datas');
    }
}
