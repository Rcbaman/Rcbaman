<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDishesTable extends Migration
{
    public function up()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_4633978')->references('id')->on('products');
            $table->unsignedBigInteger('crusts_id')->nullable();
            $table->foreign('crusts_id', 'crusts_fk_4633980')->references('id')->on('crusts');
        });
    }
}
