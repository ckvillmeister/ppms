<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('permission_code');
            $table->string('description');
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);;
            $table->integer('status')->default(1);
        });

        $date = date('Y-m-d H:i:s');
        $inputs = [
                    ['permission_code' => 'sidebarDashboard', 'description' => 'Dashboard', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarMyProcurement', 'description' => 'My Procurement', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarManageProcurement', 'description' => 'Manage Procurement', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarReports', 'description' => 'Reports', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarSetup', 'description' => 'Setup', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarDepartments', 'description' => 'Manage Departments', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarItems', 'description' => 'Manage Items', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarClassExpenditures', 'description' => 'Manage Class of Expenditures', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarObjectExpenditures', 'description' => 'Manage Object of Expenditures', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarCategories', 'description' => 'Manage Categories', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarUnits', 'description' => 'ManageUnits', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarSettings', 'description' => 'Settings', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarRoles', 'description' => 'Manage Roles', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarAccounts', 'description' => 'Manage User Accounts', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarSystemSettings', 'description' => 'Manage System Settings', 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'pagePermission', 'description' => 'Manage Permission', 'createdby' => 1, 'datecreated' => $date]
            ];

        DB::table('permissions')->insert($inputs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
