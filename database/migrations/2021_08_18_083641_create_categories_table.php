<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categories;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);;
            $table->integer('status')->default(1);
        });

        $date = date('Y-m-d H:i:s');
        $inputs = [
                ['category' => 'Pesticides or pest Repellents', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Perfumes or Colognes or Fragrances', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Alcohol or Acetone Based Antiseptics', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Color Compounds and Dispersions', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Films', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Paper Materials and Products', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Batteries and Cells Accessories', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Manufacturing Components and Supplies', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Heating and Ventilation and Air Circulation', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Medical Thermometers and Accessories', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Lighting and Fixtures and Accessories', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Measuring and Observing and Testing Equipment', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Cleaning Equipment and Supplies', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Information and Communication Technology (ICT) Equipment and Devices and Accessories', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Office Equipment and Accessories and Supplies', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Printer or Facsimile or Photocopier Supplies', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Audio and Visual Equipment and Supplies', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Flag or Accessories', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Priner Publications', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Fire Fighting Equipment', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Consumer Electronics', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Furniture and Furnishings', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Arts and Crafts Equipment and Accessories and Supplies', 'createdby' => 1, 'datecreated' => $date],
                ['category' => 'Software', 'createdby' => 1, 'datecreated' => $date],            
        ];

        Categories::insert($inputs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
