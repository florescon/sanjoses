<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorSizeProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_size_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',100)->unique()->nullable();
            $table->unsignedSmallInteger('product_id')->nullable();
            $table->unsignedMediumInteger('color_id')->nullable();
            $table->unsignedSmallInteger('size_id')->nullable();
            $table->integer('stock')->nullable();
            $table->double('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_size_product');
    }
}
