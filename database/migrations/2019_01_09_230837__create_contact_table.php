<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contact extends Migration
{
    
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",255)->nullable();
            $table->string("phone",255)->nullable();
            $table->string("email",255)->nullable();
            $table->text("message")->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
