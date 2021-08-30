<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ingredient_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_4732901')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id', 'ingredient_id_fk_4732901')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }
}
