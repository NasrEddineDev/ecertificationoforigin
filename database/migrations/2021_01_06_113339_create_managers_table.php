<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('birthday');
            $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
            $table->string('address');
            $table->string('email');//->unique();
            $table->string('mobile');//->unique();
            $table->string('tel');
            $table->integer('city_id')->unsigned();
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
        Schema::dropIfExists('managers');
    }
}
