<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlgeriaCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('algeria_cities', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('commune_name');
            $table->string('commune_name_ascii');
            $table->string('daira_name');
            $table->string('daira_name_ascii');
            $table->char('wilaya_code',2);
            $table->string('wilaya_name');
            $table->string('wilaya_name_ascii');
            $table->string('name')->nullable();
            $table->string('state_code')->nullable();
            $table->char('country_code',2)->nullable();
            $table->decimal('latitude',10,8)->nullable();
            $table->decimal('longitude',11,8)->nullable();
            $table->tinyInteger('flag')->default(1)->nullable();
            $table->string('wikiDataId')->nullable()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->nullable();
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
        Schema::dropIfExists('algeria_cities');
    }
}
