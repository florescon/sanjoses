<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialProductSaleUserSecondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_product_sale_user_seconds', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('material_product_sale_user_main_id')->nullable();
            $table->unsignedInteger('material_id')->nullable();
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
        Schema::dropIfExists('material_product_sale_user_seconds');
    }
}
