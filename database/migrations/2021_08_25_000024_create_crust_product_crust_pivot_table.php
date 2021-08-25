<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrustProductCrustPivotTable extends Migration
{
    public function up()
    {
        Schema::create('crust_product_crust', function (Blueprint $table) {
            $table->unsignedBigInteger('product_crust_id');
            $table->foreign('product_crust_id', 'product_crust_id_fk_4717812')->references('id')->on('product_crusts')->onDelete('cascade');
            $table->unsignedBigInteger('crust_id');
            $table->foreign('crust_id', 'crust_id_fk_4717812')->references('id')->on('crusts')->onDelete('cascade');
        });
    }
}
