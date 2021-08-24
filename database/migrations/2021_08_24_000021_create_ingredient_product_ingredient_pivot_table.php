<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientProductIngredientPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ingredient_product_ingredient', function (Blueprint $table) {
            $table->unsignedBigInteger('product_ingredient_id');
            $table->foreign('product_ingredient_id', 'product_ingredient_id_fk_4676446')->references('id')->on('product_ingredients')->onDelete('cascade');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id', 'ingredient_id_fk_4676446')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }
}
