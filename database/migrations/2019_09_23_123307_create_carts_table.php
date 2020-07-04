<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->unsignedMediumInteger('audi_id')->nullable();
            $table->boolean('sale_order')->default(0);
            $table->timestamps();
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('color_size_product');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
