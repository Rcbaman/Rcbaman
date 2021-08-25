<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIngredientsSizesTable extends Migration
{
    public function up()
    {
        Schema::table('ingredients_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredient_id')->nullable();
            $table->foreign('ingredient_id', 'ingredient_fk_4715889')->references('id')->on('ingredients');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id', 'size_fk_4715890')->references('id')->on('variations_sizes');
        });
    }
}
