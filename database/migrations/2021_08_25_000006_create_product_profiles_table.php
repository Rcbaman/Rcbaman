<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_08_25_000016_create_crusts_table.php
class CreateCrustsTable extends Migration
{
    public function up()
    {
        Schema::create('crusts', function (Blueprint $table) {
=======
class CreateProductProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('product_profiles', function (Blueprint $table) {
>>>>>>> origin/quickadminpanel_2021_08_25_07_03_42:database/migrations/2021_08_25_000006_create_product_profiles_table.php
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
