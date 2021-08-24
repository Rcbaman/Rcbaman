<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCrustSizesTable extends Migration
{
    public function up()
    {
        Schema::create('product_crust_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
