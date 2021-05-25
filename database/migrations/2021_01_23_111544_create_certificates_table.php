<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('code');
            $table->string('original_country');
            // $table->string('production_country')->nullable();
            // $table->string('destination_country')->nullable();
            // $table->string('producer_name');
            $table->string('notes');
            $table->string('integrity_rate');
            $table->enum('status', ['DRAFT', 'PENDING', 'SIGNED', 'REJECTED']);
            $table->enum('type', ['GZALE', 'ACP-TUNISIE', 'Form-A-En', 'Formule-A-Fr', 'ZLECAF', 'PAN-EUROMED', 'DROITS-COMMUNS']);
            $table->enum('copy_type', ['NONE', 'DUPLICATE', 'RETROACTIVE']);
            $table->enum('shipment_type', ['LAND', 'RAIL', 'AIR', 'SEA']);
            $table->enum('incoterm', ['EXW', 'CFR', 'C&F', 'CPT', 'CIF', 'FOB', 'DAP', 'FCA']);
            $table->string('validation_url');
            $table->string('rejection_reason');
            $table->date('signature_date')->nullable();
            $table->date('dri_signature_date')->nullable();
            $table->string('signed_document');
            $table->string('accumulation');
            $table->string('accumulation_country');
            $table->double('net_weight');
            $table->double('real_weight');
            $table->string('invoice');
            $table->string('invoice_date');
            $table->string('invoice_number');
            $table->string('description');
            $table->string('products_description');
            $table->string('created_pdf');
            $table->integer('enterprise_id')->unsigned();
            $table->integer('importer_id')->unsigned();
            $table->integer('producer_id')->unsigned()->nullable();
            $table->integer('certificate_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
            $table->foreign('importer_id')->references('id')->on('importers')->onDelete('cascade');
            $table->foreign('producer_id')->references('id')->on('producers')->onDelete('cascade');
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
        Schema::dropIfExists('certificates');
    }
}
