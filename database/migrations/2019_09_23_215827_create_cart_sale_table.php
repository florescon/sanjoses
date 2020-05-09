<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_sale', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedMediumInteger('sale_id')->nullable();
            $table->unsignedMediumInteger('cart_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->timestamps();
        });

        Schema::table('cart_sale', function (Blueprint $table) {
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_sale');
    }
}
