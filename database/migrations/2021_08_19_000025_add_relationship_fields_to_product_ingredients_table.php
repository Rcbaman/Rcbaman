<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductIngredientsTable extends Migration
{
    public function up()
    {
        Schema::table('product_ingredients', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_4676445')->references('id')->on('products');
        });
    }
}
