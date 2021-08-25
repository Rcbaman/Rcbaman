<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_08_25_000009_create_product_ingredients_table.php
class CreateProductIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('product_ingredients', function (Blueprint $table) {
=======
class CreateProductCrustsTable extends Migration
{
    public function up()
    {
        Schema::create('product_crusts', function (Blueprint $table) {
>>>>>>> origin/quickadminpanel_2021_08_25_11_18_41:database/migrations/2021_08_25_000003_create_product_crusts_table.php
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
