<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasTable('tbl_users'))){
            Schema::create('tbl_users', function (Blueprint $table) {
                $table->id();
                $table->string('firstname');
                $table->string('middlename');
                $table->string('lastname');
                $table->string('extension');
                $table->string('username')->unique();
                $table->string('password');
                $table->string('createdby');
                $table->datetime('datecreated');
                $table->string('updatedby');
                $table->datetime('dateupdated');
                $table->integer('status');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_users');
    }
}
