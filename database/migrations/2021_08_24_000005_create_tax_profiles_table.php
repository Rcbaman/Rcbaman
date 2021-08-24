<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_08_23_000003_create_logs_table.php
class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('device_ip');
            $table->string('device_type')->nullable();
            $table->string('action');
=======
class CreateTaxProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('tax_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('value')->nullable();
>>>>>>> 0b36c65f454d82175e9d519e739817cb1734a7e9:database/migrations/2021_08_24_000005_create_tax_profiles_table.php
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
