<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePorcentagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porcentagens', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("id_projeto");
            $table->foreign("id_projeto")->references("id")->on("projetos");
            $table->integer("total");
            $table->integer("finalizadas");
            $table->float("porcentagem");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('porcentagems');
    }
}
