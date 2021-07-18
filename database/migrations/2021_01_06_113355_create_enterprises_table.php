<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name_ar');
            $table->string('name_fr');
            $table->string('name');
            $table->enum('legal_form', ['SPA', 'SARL', 'EURL', 'ETS', 'SNC', 'OTHER']);
            $table->string('rc');
            $table->string('rc_number');
            $table->string('nif');
            $table->string('nif_number');
            $table->string('nis');
            $table->string('nis_number');
            // $table->string('activity_type');
            // $table->string('activity_type_name')->nullable();
            $table->enum('exporter_type', ['TRADER', 'CRAFTSMAN', 'PRODUCER', 'FARMER', 'OTHER']);
            $table->string('export_activity_code')->nullable();
            $table->integer('balance');
            $table->enum('status', ['DRAFT', 'PENDING', 'ACTIVATED', 'SUSPENDED', 'STOPPED']);
            $table->string('address_ar');
            $table->string('address_fr');
            $table->string('address');
            $table->string('email');//->unique();
            $table->string('mobile');//->unique();
            $table->string('tel')->nullable();//->unique();
            $table->string('website')->nullable();
            $table->string('fax')->nullable();
            $table->integer('manager_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('enterprises');
    }
}
