<?php

<<<<<<< HEAD
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
=======
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
=======
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
        Schema::dropIfExists('users');
=======
        Schema::drop('users');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
