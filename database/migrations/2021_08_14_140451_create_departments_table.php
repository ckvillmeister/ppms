<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Departments;

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
            $table->string('office_head')->nullable(true);
            $table->string('sub_office_in_charge')->nullable(true);
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);
            $table->integer('status')->default(1);
        });

        $date = date("Y-m-d H:i:s");
        $inputs = [
                    ["office_name" => "MO", "description" => "Office of the Municipal Mayor", "sub_office" => "", "office_head" => "Judith R. Cajes", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "VMO", "description" => "Office of the Municipal Vice-Mayor", "sub_office" => "", "office_head" => "Manuel Garcia", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "SB", "description" => "Sangguniang Bayan", "sub_office" => "", "office_head" => "Manuel Garcia", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "SEC", "description" => "Secretary to the Sanggunian", "sub_office" => "", "office_head" => "Warlita O. Orioque", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MHRMDO", "description" => "Municipal Human Resource Management and Development Office", "sub_office" => "", "office_head" => "Quirino T. Nugal Jr.", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MBO", "description" => "Municipal Budget Office", "sub_office" => "", "office_head" => "Medina B. Macua", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MASSO", "description" => "Municipal Assessor's Office", "sub_office" => "", "office_head" => "Reynante Magadia", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MTO", "description" => "Municipal Treasurer's Office", "sub_office" => "", "office_head" => "Evelyn E. Baradas", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "GSO", "description" => "General Services Office", "sub_office" => "", "office_head" => "Elenita L. Sawan", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "OMA", "description" => "Office of the Municipal Accountant", "sub_office" => "", "office_head" => "Sheryl D. Celo, CPA", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MLCR", "description" => "Municipal Local Civil Registrar", "sub_office" => "", "office_head" => "Leonila Tubo", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MSWDO", "description" => "Municipal Social Welfare and Development Office", "sub_office" => "", "office_head" => "Vicky E. Cajes", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MAO", "description" => "Municipal Agriculture Office", "sub_office" => "", "office_head" => "Avelina Lopiceros", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MPDO", "description" => "Municipal Planning and Development Office", "sub_office" => "", "office_head" => "Engr. Marvis G. Dellosa", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MEO", "description" => "Municipal Engineering Office", "sub_office" => "", "office_head" => "Engr. Teodomiro Balonga", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MDRRMO", "description" => "Municipal Disaster and Risk-Reduction Office", "sub_office" => "", "office_head" => "Diego V. Medina", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "BPLO", "description" => "Business Permit and Licensing Office", "sub_office" => "", "office_head" => "Marcelo Empleo", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "College of Computer Studies", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Clark Kevin V. Villamor", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "College of Teacher Education", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Misael A. Salisid", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "College of Office Administration", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Sr. Isabelita J. Bulala", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "College of Arts and Sciences", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Selvino B. Naval", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "College of Criminal Justice Education", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Cesar D. Cañete", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "Registrar's Office", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Iris Mae R. Catanio", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "Electronic Data Processing Office", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Marlon V. Macua", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "Guidance Office", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Isabelita B. Aranas", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "Student Affair's Office", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Selvino B. Naval", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "Library", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Geoffrey Orevillo", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "TMC", "description" => "Trinidad Municipal College", "sub_office" => "Administrator's Office", "office_head" => "Atty. Roberto C. Cajes", "sub_office_in_charge" => "Atty. Roberto C. Cajes", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "IAU", "description" => "Internal Audit Unit", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "COA", "description" => "Commission on Audit", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],   
                    ["office_name" => "MCTC", "description" => "Municipal Circuit Trial Court", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "PNP", "description" => "Philippine National Police", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "BFP", "description" => "Bureau of Fire Protection", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "COMELEC", "description" => "Commission on Election", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "BIR", "description" => "Bureau of Internal Revenue", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MHU", "description" => "Municipal Health Unit", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MLGOO", "description" => "Municipal Local Government Operations", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                    ["office_name" => "MTC", "description" => "Municipal Training Center", "sub_office" => "", "office_head" => "", "sub_office_in_charge" => "", "createdby" => 1, "datecreated" => $date],
                ];
        Departments::insert($inputs);
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
