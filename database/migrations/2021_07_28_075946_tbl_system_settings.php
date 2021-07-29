<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSystemSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasTable('tbl_system_settings'))){
            Schema::create('tbl_system_settings', function (Blueprint $table) {
                $table->id();
                $table->string('setting_name');
                $table->string('setting_description');
                $table->integer('status');
            });

            DB::table('tbl_system_settings')->insert(
                array(
                    'setting_name' => 'Application Name',
                    'setting_description' => 'Project Procurement Management System',
                    'status' => 1
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_system_settings');
    }
}
