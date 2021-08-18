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
            $table->string('head')->nullable(true);
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

// INSERT INTO departments (office_name, description, sub_office, head, createdby, datecreated, status) VALUES 
// ("TMC", "Trinidad Municipal College", "College of Computer Studies",                         'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "College of Office Administration",                    'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "College of College of Criminal Justice Education",    'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "College of Arts & Sciences",                          'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "College of Teacher Education",                        'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Registrar's Office",                                  'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Electronic Data Processing Office",                   'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Student Affairs Office",                              'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Guidance Office",                                     'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Library",                                             'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("TMC", "Trinidad Municipal College", "Administrator's Office",                              'Atty. Roberto C. Cajes', 1, NOW(), 1),
// ("MO", "Office of the Municipal Mayor", '',                                                  'Judith R. Cajes', 1, NOW(), 1),
// ("VMO", "Office of the Municipal Vice-Mayor", '',                                            'Manuel Garcia', 1, NOW(), 1),
// ("MHRMDO", "Municipal Human Resource Management and Development Office", '',                 'Quirino T. Nugal', 1, NOW(), 1),
// ("MBO", "Municipal Budget Office", '',                                                       'Medina B. Macua', 1, NOW(), 1),
// ("MASSO", "Municipal Assessor's Office", '',                                                 'Reynante Magadia', 1, NOW(), 1),
// ("MTO", "Municipal Treasurer's Office", '',                                                  'Evelyn E. Baradas', 1, NOW(), 1),
// ("GSO", "General Services Office", '',                                                       'Elenita L. Sawan', 1, NOW(), 1),
// ("OMA", "Office of the Municipal Accountant", '',                                            'Sheryl D. Celo', 1, NOW(), 1),
// ("MLCR", "Municipal Local Civil Registrar", '',                                              'Leonila Tubo', 1, NOW(), 1),
// ("MSWDO", "Municipal Social Welfare and Development Office", '',                             'Vicky E. Cajes', 1, NOW(), 1),
// ("MAO", "Municipal Agriculture Office", '',                                                  'Avelina Lopiceros', 1, NOW(), 1),
// ("MPDO", "Municipal Planning and Development Office", '',                                    'Engr. Marvis G. Dellosa', 1, NOW(), 1),
// ("MEO", "Municipal Engineering Office", '',                                                  'Engr. Teodomiro Balonga', 1, NOW(), 1),
// ("MDRRMO", "Municipal Disaster and Risk-Reducation Office", '',                              'Diego V. Medina', 1, NOW(), 1);
