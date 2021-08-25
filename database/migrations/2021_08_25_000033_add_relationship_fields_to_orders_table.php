<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_4715980')->references('id')->on('customer_details');
            $table->unsignedBigInteger('ordertakenby_id')->nullable();
            $table->foreign('ordertakenby_id', 'ordertakenby_fk_4715981')->references('id')->on('users');
        });
    }
}
