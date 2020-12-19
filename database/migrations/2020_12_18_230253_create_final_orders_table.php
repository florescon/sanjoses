<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_orders', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('ticket_text')->nullable();
            $table->unsignedSmallInteger('payment_method_id')->nullable();
            $table->unsignedMediumInteger('audi_id')->nullable();
            $table->unsignedInteger('type')->nullable();
            $table->date('date_entered')->nullable();
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
        Schema::dropIfExists('final_orders');
    }
}
