<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('ticket_text')->nullable();
            $table->unsignedSmallInteger('payment_method_id')->nullable();
            $table->unsignedMediumInteger('audi_id')->nullable();
            $table->unsignedInteger('box')->nullable();
            $table->unsignedInteger('type')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sales');
    }
}
