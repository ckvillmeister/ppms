<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePermissionCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_category', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->integer('status')->default(1);
        });

        $inputs = [
            ['category' => 'Sidebar Menu'],
            ['category' => 'Departments Page'],
            ['category' => 'Object of Expenditures Page'],
            ['category' => 'PPMP Page']
        ];

        DB::table('permission_category')->insert($inputs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_category');
    }
}
