<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasTable('settings'))){
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('setting_name');
                $table->string('setting_description');
                $table->integer('status');
            });

            DB::table('settings')->insert(
                array(
                    'setting_name' => 'Application Name',
                    'setting_description' => 'Project Procurement Management System',
                    'status' => 1
                )
            );

            DB::table('settings')->insert(
                array(
                    'setting_name' => 'Procurement Year',
                    'setting_description' => '2022',
                    'status' => 1
                ),
            );

            DB::table('settings')->insert(
                array(
                    'setting_name' => 'Procurement Status',
                    'setting_description' => 1,
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
        Schema::dropIfExists('settings');
    }
}
