<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{

    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nome");
            $table->date("inicio");
            $table->date("fim");
            $table->softDeletes();
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
        Schema::dropIfExists('projetos');
    }
}
