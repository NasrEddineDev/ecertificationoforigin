<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id', true);
            $table->string('username');//->unique();
            $table->string('email');//->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('role_id')->unsigned();
            $table->integer('profile_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
