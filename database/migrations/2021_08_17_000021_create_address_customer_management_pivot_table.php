<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressCustomerManagementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('address_customer_management', function (Blueprint $table) {
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id', 'address_id_fk_4648983')->references('id')->on('addresses')->onDelete('cascade');
            $table->unsignedBigInteger('customer_management_id');
            $table->foreign('customer_management_id', 'customer_management_id_fk_4648983')->references('id')->on('customer_managements')->onDelete('cascade');
        });
    }
}
