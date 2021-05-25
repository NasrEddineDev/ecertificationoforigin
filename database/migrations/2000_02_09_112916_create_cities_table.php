<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name');
            $table->string('state_code');
            $table->char('country_code',2);
            $table->decimal('latitude',10,8);
            $table->decimal('longitude',11,8);
            $table->tinyInteger('flag')->default(1);
            $table->string('wikiDataId')->nullable();
            $table->integer('state_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
