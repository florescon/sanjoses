<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('sale_id')->nullable();
            $table->unsignedSmallInteger('status_id')->nullable();
            $table->unsignedInteger('audi_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_sale');
    }
}
