<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name');
            $table->string('description');
            // $table->string('type');
            $table->string('brand');
            $table->string('hs_code'); 
            $table->enum('measure_unit', ['KG', 'T', 'U', 'L', 'M²', 'M']);
            $table->integer('enterprise_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->integer('customs_tariff_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
            $table->foreign('customs_tariff_id')->references('id')->on('customs_tariffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
