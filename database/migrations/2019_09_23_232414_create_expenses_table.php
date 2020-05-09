<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('ticket_text')->nullable();
            $table->unsignedMediumInteger('audi_id')->nullable();
            $table->unsignedInteger('box')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
