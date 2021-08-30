<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductSizesTable extends Migration
{
    public function up()
    {
        Schema::table('product_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_4715956')->references('id')->on('products');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id', 'size_fk_4715957')->references('id')->on('variations_sizes');
        });
    }
}
