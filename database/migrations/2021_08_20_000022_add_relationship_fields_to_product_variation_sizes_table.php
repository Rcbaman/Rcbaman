<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductVariationSizesTable extends Migration
{
    public function up()
    {
        Schema::table('product_variation_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_4628889')->references('id')->on('products');
            $table->unsignedBigInteger('variationsize_id');
            $table->foreign('variationsize_id', 'variationsize_fk_4628890')->references('id')->on('variations_sizes');
        });
    }
}
