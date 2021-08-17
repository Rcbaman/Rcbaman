<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('customer_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mobile_number')->unique();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
