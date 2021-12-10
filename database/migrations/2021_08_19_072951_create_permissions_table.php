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
            $table->string('category');
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);
            $table->integer('status')->default(1);
        });

        $date = date('Y-m-d H:i:s');
        $inputs = [
                    ['permission_code' => 'sidebarDashboard', 'description' => 'Dashboard', 'category' => 1, 'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarMyProcurement', 'description' => 'My Procurement', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarManageProcurement', 'description' => 'Manage Procurement', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarReports', 'description' => 'Reports', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarSetup', 'description' => 'Setup', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarDepartments', 'description' => 'Manage Departments', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarItems', 'description' => 'Manage Items', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarClassExpenditures', 'description' => 'Manage Class of Expenditures', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarObjectExpenditures', 'description' => 'Manage Object of Expenditures', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarCategories', 'description' => 'Manage Categories', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarUnits', 'description' => 'ManageUnits', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarSettings', 'description' => 'Settings', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarRoles', 'description' => 'Manage Roles', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarAccounts', 'description' => 'Manage User Accounts', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'sidebarSystemSettings', 'description' => 'Manage System Settings', 'category' => 1,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'pagePermission', 'description' => 'Manage Permission', 'category' => 2,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'pageApprovePPMP', 'description' => 'Approve PPMP', 'category' => 2,  'createdby' => 1, 'datecreated' => $date],
                    ['permission_code' => 'pageModifyPPMP', 'description' => 'Modify PPMP from other Department', 'category' => 2,  'createdby' => 1, 'datecreated' => $date],
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
