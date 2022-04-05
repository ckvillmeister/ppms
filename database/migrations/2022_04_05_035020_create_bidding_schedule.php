<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidding_schedule', function (Blueprint $table) {
            $table->id();
            $table->integer('item');
            $table->date('advertisement')->nullable(true);
            $table->date('bidding')->nullable(true);
            $table->date('award')->nullable(true);
            $table->date('contract_signing')->nullable(true);
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidding_schedule');
    }
}
