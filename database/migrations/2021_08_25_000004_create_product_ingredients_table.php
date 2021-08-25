<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_08_24_000017_create_product_categories_table.php
class CreateProductCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
=======
class CreateProductIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('product_ingredients', function (Blueprint $table) {
>>>>>>> quickadminpanel_2021_08_25_05_55_16:database/migrations/2021_08_25_000004_create_product_ingredients_table.php
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
