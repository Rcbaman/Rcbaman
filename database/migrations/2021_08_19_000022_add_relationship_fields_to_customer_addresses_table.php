<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomerAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('customer_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_4670734')->references('id')->on('customer_details');
        });
    }
}
