<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trament_details', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('quantity');
            $table->double('price');
             $table->double('price_unit');
            $table->unsignedBigInteger('treatment_id');
            $table->unsignedBigInteger('procedure_id');
            $table->timestamps();
            $table->foreign('treatment_id')->references('id')->on('medical_treatments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('procedure_id')->references('id')->on('medical_procedures')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trament_details');
    }
}
