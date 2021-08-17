<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishDishIngredientPivotTable extends Migration
{
    public function up()
    {
        Schema::create('dish_dish_ingredient', function (Blueprint $table) {
            $table->unsignedBigInteger('dish_id');
            $table->foreign('dish_id', 'dish_id_fk_4633979')->references('id')->on('dishes')->onDelete('cascade');
            $table->unsignedBigInteger('dish_ingredient_id');
            $table->foreign('dish_ingredient_id', 'dish_ingredient_id_fk_4633979')->references('id')->on('dish_ingredients')->onDelete('cascade');
        });
    }
}
