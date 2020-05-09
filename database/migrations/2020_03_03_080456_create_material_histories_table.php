<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('material_id')->nullable();
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
        Schema::dropIfExists('material_histories');
    }
}
