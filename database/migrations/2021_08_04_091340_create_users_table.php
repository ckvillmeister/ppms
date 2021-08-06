<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasTable('users'))){
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('firstname');
                $table->string('middlename')->nullable(true);
                $table->string('lastname');
                $table->string('extension')->nullable(true);
                $table->string('username')->unique();
                $table->string('password');
                $table->timestamps();
                $table->string('createdby')->nullable(true);
                $table->datetime('datecreated')->nullable(true);
                $table->string('updatedby')->nullable(true);
                $table->datetime('dateupdated')->nullable(true);;
                $table->integer('status');
            });
        }

        $password = md5('E9q3gnDr');
        $datenow = date('Y-m-d H:i:s');
        $inputs = ['firstname' => 'Super','lastname' => 'User','username' => 'super.user','password' => $password,'datecreated' => $datenow,'status' => 1];
        User::create($inputs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
