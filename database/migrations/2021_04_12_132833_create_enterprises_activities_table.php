<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises_activities', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('enterprise_id')->unsigned();
            $table->foreign('enterprise_id')->references('id')
                  ->on('enterprises')->onDelete('cascade');        
            $table->integer('activity_id')->unsigned();
            $table->foreign('activity_id')->references('id')
                  ->on('activities')->onDelete('cascade');
                  $table->timestamps();
                  $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enterprises_activities');
    }
}
