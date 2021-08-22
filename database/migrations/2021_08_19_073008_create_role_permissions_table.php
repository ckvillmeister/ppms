<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->integer('permission_id');
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);;
            $table->integer('status')->default(1);
        });

        $date = date('Y-m-d H:i:s');
        $inputs = [
                    ['role_id' => 1, 'permission_id' => 1, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 2, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 3, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 4, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 5, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 6, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 7, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 8, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 9, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 10, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 11, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 12, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 13, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 14, 'createdby' => 1, 'datecreated' => $date],
                    ['role_id' => 1, 'permission_id' => 15, 'createdby' => 1, 'datecreated' => $date]
            ];

        DB::table('role_permissions')->insert($inputs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions');
    }
}
