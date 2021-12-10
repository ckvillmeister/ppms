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
            $table->string('obj_exp_name')->nullable(true);
            $table->integer('class_exp_id')->nullable(true);
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);;
            $table->integer('status')->default(1);  
        });
        
        $datenow = date('Y-m-d H:i:s');
        $inputs = [
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Office Supplies', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Accountable Forms', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Advertising Expenses (including Promotion of Tourism)', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Advertising/Publication', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Agricultural and Marine Supplies', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Animal/Zoological Supplies', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Books', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Chemical and Filtering Supplies Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Disaster Response and Rescue Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Drugs & Medicines', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Food Supplies', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Fuel, Oil & Lubricants Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Furniture and Fixtures', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Information & Communication Technology Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Medical, Dental & Laboratory Supplies', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Office Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Other MOOE and Capital Outlay', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Other Supplies and Materials', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Other Supplies Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repair and Maintenance - Plumbing Equipments', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repairs and Maintenance - Buildings & Other Structures (Public Market)', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repairs and Maintenance - Communication Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repairs and Maintenance - Construction & Heavy Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repairs and Maintenance - IT Equipment & Software', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repairs and Maintenance - Machinery & Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repairs and Maintenance - Motor Vehicles', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repairs and Maintenance - Office Buildings', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Repairs and Maintenance - Transportation Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Representation Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'School Buildings', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Security Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Subscription Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Technical & Scientific Equipment', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Telephone Expenses - Mobile', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Training Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_id' => 1, 'obj_exp_name' => 'Welfare Goods', 'createdby' => 1, 'datecreated' => $datenow],
                ];
        ObjectExpenditure::insert($inputs);
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
