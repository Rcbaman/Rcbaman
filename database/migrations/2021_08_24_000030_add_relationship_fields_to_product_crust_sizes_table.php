<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductCrustSizesTable extends Migration
{
    public function up()
    {
        Schema::table('product_crust_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_4628896')->references('id')->on('products');
            $table->unsignedBigInteger('crust_id');
            $table->foreign('crust_id', 'crust_fk_4628900')->references('id')->on('crusts');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id', 'size_fk_4628901')->references('id')->on('product_variation_sizes');
        });
    }
}
