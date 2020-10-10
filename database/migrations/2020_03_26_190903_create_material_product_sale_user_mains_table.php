<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialProductSaleUserMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_product_sale_user_mains', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('sale_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('status_id')->nullable();
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
        Schema::dropIfExists('material_product_sale_user_mains');
    }
}
