<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrustProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('crust_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_4732902')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('crust_id');
            $table->foreign('crust_id', 'crust_id_fk_4732902')->references('id')->on('crusts')->onDelete('cascade');
        });
    }
}
