<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCrustSizesTable extends Migration
{
    public function up()
    {
        Schema::table('crust_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('crust_id');
            $table->foreign('crust_id', 'crust_fk_4715882')->references('id')->on('crusts');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id', 'size_fk_4715883')->references('id')->on('variations_sizes');
        });
    }
}
