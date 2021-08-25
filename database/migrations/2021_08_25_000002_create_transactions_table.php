<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('method');
            $table->decimal('sub_total', 15, 2)->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->decimal('other_charges', 15, 2)->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
