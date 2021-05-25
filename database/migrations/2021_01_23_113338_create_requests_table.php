<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('number');
            $table->string('title');
            $table->string('description');
            $table->string('message');
            $table->enum('status', ['DRAFT', 'PENDING', 'ACCEPTED', 'REJECTED']);
            $table->enum('type', ['DUPLICATE', 'RETROACTIVE']);
            $table->integer('user_id')->unsigned();
            $table->integer('enterprise_id')->unsigned()->nullable();
            $table->integer('certificate_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
