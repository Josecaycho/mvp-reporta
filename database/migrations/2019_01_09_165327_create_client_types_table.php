<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTypesTable extends Migration
{
    
    public function up()
    {
        Schema::create('client_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable();
            $table->integer("status")->default("1");

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_types');
    }
}
