<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_08_19_000005_create_product_ingredients_table.php
class CreateProductIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('product_ingredients', function (Blueprint $table) {
=======
class CreateProductCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
>>>>>>> origin/quickadminpanel_2021_08_24_09_47_02:database/migrations/2021_08_24_000017_create_product_categories_table.php
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
