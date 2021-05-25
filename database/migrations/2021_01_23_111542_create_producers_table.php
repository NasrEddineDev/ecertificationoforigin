<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name');
            $table->string('legal_form');
            $table->string('activity_type');
            $table->string('type');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('website');
            $table->string('tel')->unique();
            $table->string('fax');
            $table->integer('enterprise_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producers');
    }
}
