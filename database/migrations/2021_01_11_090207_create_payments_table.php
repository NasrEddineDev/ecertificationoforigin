<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id', true);
            $table->enum('type', ['CASH', 'INSTALLMENT', 'DHAHABIA']);
            $table->enum('mode', ['CREDIT', 'DEBIT']);
            $table->enum('status', ['DRAFT', 'ACCEPTED', 'REJECTED']);
            $table->double('amount');
            $table->double('current_balance');
            $table->date('date');
            $table->string('description');
            $table->string('order_id');
            $table->string('document');
            $table->integer('enterprise_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
