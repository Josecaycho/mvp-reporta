<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectsTable extends Migration
{
    
    public function up()
    {
        Schema::create('proyects', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable();
            $table->integer("status")->default("1");
            $table->text("descripcion")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyects');
    }
}
