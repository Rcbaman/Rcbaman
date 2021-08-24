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
<<<<<<< HEAD:database/migrations/2021_08_19_000004_create_transactions_table.php
            $table->string('status')->nullable();
            $table->string('method');
            $table->decimal('sub_total', 15, 2)->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->decimal('other_charges', 15, 2)->nullable();
            $table->decimal('amount', 15, 2);
=======
            $table->string('method');
            $table->decimal('sub_total', 15, 2)->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->decimal('other_charges', 15, 2)->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('status')->nullable();
>>>>>>> 0b36c65f454d82175e9d519e739817cb1734a7e9:database/migrations/2021_08_24_000008_create_transactions_table.php
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
