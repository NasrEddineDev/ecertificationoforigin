<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_certificates', function (Blueprint $table) {
            $table->increments('id', true);
            // $table->string('package_type');
            $table->enum('package_type', ['FIBREBOARD BOXES (CARDBOARD BOXES)', 'CLEATED PLYWOOD BOXES', 
            'STEEL DRUMS', 'BARRELS, CASKS OR KEGS', 'MULTI-WALL SHIPPING SACKS', 'BALES', 'PALLETIZING CARGO']);
            $table->double('package_count');
            $table->double('package_quantity');
            $table->double('unit_price');
            $table->enum('currency', ['DZD', 'EUR', 'USD', 'SAR', 'AED', 'CNY', 'CAD']);
            $table->string('description');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')
                  ->on('products')->onDelete('cascade');        
            $table->integer('certificate_id')->unsigned();
            $table->foreign('certificate_id')->references('id')
                  ->on('certificates')->onDelete('cascade');
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
        Schema::dropIfExists('products_certificates');
    }
}
