<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('office_name');
            $table->string('description')->nullable(true);
            $table->string('sub_office')->nullable(true);
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);;
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
        Schema::dropIfExists('departments');
    }
}

// INSERT INTO departments (office_name, description, sub_office, createdby, datecreated, status) VALUES 
// ("TMC", "Trinidad Municipal College", "College of Computer Studies", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "College of Office Administration", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "College of College of Criminal Justice Education", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "College of Arts & Sciences", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "College of Teacher Education", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Registrar's Office", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Electronic Data Processing Office", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Student Affairs Office", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Guidance Office", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Library", 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Administrator's Office", 1, NOW(), 1),
// ("MO", "Office of the Municipal Mayor", '', 1, NOW(), 1),
// ("VMO", "Office of the Municipal Vice-Mayor", '', 1, NOW(), 1),
// ("MHRMDO", "Municipal Human Resource Management and Development Office", '', 1, NOW(), 1),
// ("MBO", "Municipal Budget Office", '', 1, NOW(), 1),
// ("MASSO", "Municipal Assessor's Office", '', 1, NOW(), 1),
// ("MTO", "Municipal Treasurer's Office", '', 1, NOW(), 1),
// ("GSO", "General Services Office", '', 1, NOW(), 1),
// ("OMA", "Office of the Municipal Accountant", '', 1, NOW(), 1),
// ("MLCR", "Municipal Local Civil Registrar", '', 1, NOW(), 1),
// ("MSWDO", "Municipal Social Welfare and Development Office", '', 1, NOW(), 1),
// ("MAO", "Municipal Agriculture Office", '', 1, NOW(), 1),
// ("MPDO", "Municipal Planning and Development Office", '', 1, NOW(), 1),
// ("MEO", "Municipal Engineering Office", '', 1, NOW(), 1),
// ("MDRRMO", "Municipal Disaster and Risk-Reducation Office", '', 1, NOW(), 1);