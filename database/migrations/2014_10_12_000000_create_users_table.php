<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('lastname',100);
            $table->string('firstname',100);
            $table->string('username',100);
            $table->string('email',100)->unique();
            $table->string('password',255);
            $table->integer('num_post');
            $table->integer('num_likes');
            $table->string('profile_img');
            $table->string('user_closed');
            $table->text('friend_array');
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
        Schema::dropIfExists('users');
    }
}
