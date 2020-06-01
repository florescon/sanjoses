<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizeBomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_boms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('material_id');
            $table->unsignedSmallInteger('size_id')->nullable();
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
        Schema::dropIfExists('size_boms');
    }
}
