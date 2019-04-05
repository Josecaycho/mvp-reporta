<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("product_id");
            $table->string("name", 255)->nullable();
            $table->text("description")->nullable();
            $table->string("video_path", 300);
            $table->string("path", 255)->nullable();
            $table->integer("status")->default("1");
            $table->date("published")->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
