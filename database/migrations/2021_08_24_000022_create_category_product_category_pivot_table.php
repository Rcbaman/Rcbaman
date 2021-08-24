<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_product_category', function (Blueprint $table) {
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id', 'product_category_id_fk_4709703')->references('id')->on('product_categories')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_4709703')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
