<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurement_info', function (Blueprint $table) {
            $table->id();
            $table->integer('department');
            $table->integer('year');
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);
            $table->integer('status');
        });

        Schema::create('procurement_items', function (Blueprint $table) {
            $table->id();
            $table->integer('procurement_id');
            $table->string('itemname');
            $table->string('unit');
            $table->integer('object');
            $table->integer('quantity');
            $table->double('price');
            $table->string('mode');
            $table->integer('january')->nullable(true);
            $table->integer('february')->nullable(true);
            $table->integer('march')->nullable(true);
            $table->integer('april')->nullable(true);
            $table->integer('may')->nullable(true);
            $table->integer('june')->nullable(true);
            $table->integer('july')->nullable(true);
            $table->integer('august')->nullable(true);
            $table->integer('september')->nullable(true);
            $table->integer('october')->nullable(true);
            $table->integer('november')->nullable(true);
            $table->integer('december')->nullable(true);
            $table->string('addedby')->nullable(true);
            $table->datetime('dateadded')->nullable(true);
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('procurements');
    }
}
