<?php

<<<<<<< HEAD
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
=======
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
<<<<<<< HEAD
            $table->string('token');
            $table->timestamp('created_at')->nullable();
=======
            $table->string('token')->index();
            $table->timestamp('created_at');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
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
        Schema::dropIfExists('password_resets');
=======
        Schema::drop('password_resets');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
