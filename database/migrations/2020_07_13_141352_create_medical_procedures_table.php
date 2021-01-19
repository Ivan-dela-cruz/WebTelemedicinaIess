<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('description')->nullable();
            $table->double('price');
            $table->unsignedBigInteger('id_concept');
            $table->unsignedBigInteger('id_reference');
            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();

            $table->foreign('id_concept')->references('id')->on('conceptos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_reference')->references('id')->on('references')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_procedures');
    }
}
