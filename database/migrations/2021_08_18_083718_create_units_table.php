<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Units;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('uom');
            $table->string('description');
            $table->string('createdby')->nullable(true);
            $table->datetime('datecreated')->nullable(true);
            $table->string('updatedby')->nullable(true);
            $table->datetime('dateupdated')->nullable(true);;
            $table->integer('status')->default(1);
        });

        $date = date('Y-m-d H:i:s');
        $inputs = [
            ['uom' => 'm', 'description' => 'meter', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'km', 'description' => 'kilometer', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'box', 'description' => 'box', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'bot', 'description' => 'bottle', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'roll', 'description' => 'roll', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'unit', 'description' => 'unit', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'pc', 'description' => 'piece', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'pcs', 'description' => 'pieces', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'ream', 'description' => 'ream', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'doz', 'description' => 'dozen', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'set', 'description' => 'set', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'length', 'description' => 'length', 'createdby' => 1, 'datecreated' => $date],
            ['uom' => 'pack', 'description' => 'pack', 'createdby' => 1, 'datecreated' => $date]
        ];
        Units::insert($inputs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
