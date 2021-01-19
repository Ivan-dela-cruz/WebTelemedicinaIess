<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_doctor');
            $table->unsignedBigInteger('id_specialty');
            $table->string('reason')->nullable();
            $table->string('observation')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->string('color')->nullable();
            $table->enum('status',['Atendido','Anulado','Pendiente','Confirmado','No asiste','No confirmado'])->default('Pendiente');
            $table->timestamps();

            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_specialty')->references('id')->on('specialties')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
