<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_treatments', function (Blueprint $table) {
            $table->id();
            $table->string('reason')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('specailty_id');
            $table->double('price_total')->default(0);
            $table->enum('status', ['anulado', 'cancelado', 'pendiente', 'proceso'])->default('pendiente');
            $table->enum('status_pay', ['contado', 'coutas'])->default('contado');
            $table->integer('num_pay')->nullable()->default(0);
            $table->date('date_pay')->nullable();
            $table->string('url_file')->nullable();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('specailty_id')->references('id')->on('specialties')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_treatments');
    }
}
