<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_revisions', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('sale_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->double('quantity')->nullable();
            $table->double('ready_quantity')->nullable();
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
        Schema::dropIfExists('stock_revisions');
    }
}
