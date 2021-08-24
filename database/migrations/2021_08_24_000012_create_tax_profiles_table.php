<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTaxProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('tax_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
