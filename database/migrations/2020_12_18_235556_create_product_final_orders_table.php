<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFinalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_final_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('final_order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->double('quantity')->nullable();
            $table->double('price')->nullable();
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
        Schema::dropIfExists('product_final_orders');
    }
}
