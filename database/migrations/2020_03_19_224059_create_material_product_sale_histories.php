<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialProductSaleHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_product_sale_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('material_product_sale_id')->nullable();
            $table->double('old_quantity')->nullable();
            $table->double('quantity')->nullable();
            $table->tinyInteger('type')->nullable();
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
        Schema::dropIfExists('material_product_sale_histories');
    }
}
