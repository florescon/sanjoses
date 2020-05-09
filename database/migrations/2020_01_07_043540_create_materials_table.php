<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('part_number')->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->double('acquisition_cost')->nullable();
            $table->double('price')->nullable();
            $table->double('stock')->nullable();
            $table->unsignedSmallInteger('unit_id')->nullable();
            $table->unsignedMediumInteger('color_id')->nullable();
            $table->unsignedSmallInteger('size_id')->nullable();
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
        Schema::dropIfExists('materials');
    }
}
