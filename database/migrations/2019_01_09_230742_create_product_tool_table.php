<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductToolTable extends Migration
{
    
    public function up()
    {
        Schema::create('product_tool', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->unsignedInteger('tool_id');
            $table->foreign('tool_id')
                ->references('id')
                ->on('tools')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_tool');
    }
}
