<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->foreign('transaction_id', 'transaction_fk_4649180')->references('id')->on('transactions');
        });
    }
}
