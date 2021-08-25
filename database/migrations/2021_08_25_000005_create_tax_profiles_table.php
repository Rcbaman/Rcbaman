<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_08_24_000012_create_tax_profiles_table.php

=======
>>>>>>> quickadminpanel_2021_08_25_05_55_16:database/migrations/2021_08_25_000005_create_tax_profiles_table.php
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
