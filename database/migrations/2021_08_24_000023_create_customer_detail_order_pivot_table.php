<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDetailOrderPivotTable extends Migration
{
    public function up()
    {
        Schema::create('customer_detail_order', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id', 'order_id_fk_4703013')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('customer_detail_id');
            $table->foreign('customer_detail_id', 'customer_detail_id_fk_4703013')->references('id')->on('customer_details')->onDelete('cascade');
        });
    }
}
