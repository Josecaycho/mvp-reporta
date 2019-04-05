<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulantsTable extends Migration
{
    
    public function up()
    {
        Schema::create('postulants', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", 80)->default("nameDefault");
$table->text("type");

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('postulants');
    }
}
