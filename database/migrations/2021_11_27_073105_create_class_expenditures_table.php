<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ClassExpenditure;

class CreateClassExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_expenditures', function (Blueprint $table) {
            $table->id();
            $table->string('class_exp_name')->nullable(true);
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);;
            $table->integer('status')->default(1);  
        });
        
        $datenow = date('Y-m-d H:i:s');
        $inputs = [
                    ['class_exp_name' => 'Maintenance and Other Operating Expenses', 'createdby' => 1, 'datecreated' => $datenow],
                    ['class_exp_name' => 'Capital Outlay', 'createdby' => 1, 'datecreated' => $datenow]
                ];
        ClassExpenditure::insert($inputs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_expenditures');
    }
}
