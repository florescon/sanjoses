<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_product_sale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedMediumInteger('sale_id')->nullable();
            $table->unsignedInteger('material_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->double('quantity')->nullable();
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
        Schema::dropIfExists('material_product_sale');
    }
}
