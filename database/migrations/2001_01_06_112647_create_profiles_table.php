<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
            $table->date('birthday')->nullable();
            $table->string('address');
            $table->string('signature');
            $table->string('square_stamp');
            $table->string('round_stamp');
            $table->string('picture');
            $table->string('agce_user_id');
            $table->string('language');
            $table->string('theme');
            $table->integer('city_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('city_id')->references('id')->on('algeria_cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
