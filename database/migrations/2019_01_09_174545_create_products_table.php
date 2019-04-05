<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("client_id");
            $table->integer("category_id");
            $table->integer("proyect_id");
            $table->string("name", 255)->nullable();
            $table->text("description")->nullable();
            $table->integer("status")->default("1");
            $table->date("published")->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
