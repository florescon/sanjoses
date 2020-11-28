<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockRevisionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_revision_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedMediumInteger('sale_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->double('quantity')->nullable();
            $table->unsignedInteger('type')->nullable();
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
        Schema::dropIfExists('stock_revision_logs');
    }
}
