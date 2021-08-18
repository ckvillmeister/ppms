<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ObjectExpenditure;

class CreateObjectExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_expenditures', function (Blueprint $table) {
            $table->id();
            $table->string('obj_exp_name');
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);;
            $table->integer('status');
        });
        
        $datenow = date('Y-m-d H:i:s');
        $inputs = [
                    ['obj_exp_name' => 'Office Supplies', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Medical, Dental & Laboratory Supplies', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Fuel, Oil & Lubricants Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Other Supplies Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Telephone Expenses - Mobile', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Advertising Expenses (including Promotion of Tourism)', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Representation Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Subscription Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Chemical and Filtering Supplies Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Repair and Maintenance - Plumbing Equipments', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Advertising/Publication', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Repairs and Maintenance - Office Buildings', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Repair and Maintenance - Buildings & Other Structures (Public Market)', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Repair and Maintenance - Machinery & Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Repair and Maintenance - IT Equipment & Software', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Repair and Maintenance - Communication Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Repair and Maintenance - Construction & Heavy Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Repair and Maintenance - Motor Vehicles', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Office Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['obj_exp_name' => 'Information & Communication Technology Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                ];
        ObjectExpenditure::create($inputs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_expenditures');
    }
}
