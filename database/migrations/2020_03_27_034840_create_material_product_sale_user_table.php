<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialProductSaleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_product_sale_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedMediumInteger('sale_id')->nullable();
            $table->unsignedInteger('material_id')->nullable();
            $table->double('quantity')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->integer('folio')->nullable();   
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
        Schema::dropIfExists('material_product_sale_user');
    }
}
