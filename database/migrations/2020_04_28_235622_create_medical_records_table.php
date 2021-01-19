<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->mediumText('reason')->nullable()->default('')->change();
            $table->mediumText('symptoms')->nullable()->default('')->change();

            $table->mediumText('family_background')->nullable()->default('')->change();
            $table->mediumText('personal_background')->nullable()->default('')->change();
            $table->mediumText('previous_treatment')->nullable()->default('')->change();
            $table->mediumText('date_last_treatment')->nullable()->default('')->change();

            $table->mediumText('surgical_interventions')->nullable()->default('')->change();
            $table->mediumText('medication')->nullable()->default('')->change();

            $table->mediumText('anesthesia')->nullable()->default('')->change();
            $table->mediumText('hemorrhages')->nullable()->default('')->change();
            $table->string('diabetes')->nullable()->default('');
            $table->string('hypertension')->nullable()->default('');
            $table->string('contagious')->nullable()->default('');
            $table->string('cardiovascular')->nullable()->default('');
            $table->string('respiratory')->nullable()->default('');
            $table->string('pregnancy')->nullable()->default('');
            $table->mediumText('recent_disease')->nullable()->default('')->change();
            $table->mediumText('congenital_disorders')->nullable()->default('')->change();
            $table->string('alcohol')->nullable()->default('');
            $table->string('smokes')->nullable()->default('');

            $table->string('annoyance')->nullable()->default('');
            $table->string('bad_smell')->nullable()->default('');
            $table->string('bleeding')->nullable()->default('');
            $table->string('teeth')->nullable()->default('');
            $table->mediumText('bad_habits')->nullable()->default('')->change();
            $table->string('brush')->nullable()->default('');
            $table->string('additive')->nullable()->default('');
            $table->mediumText('observation')->nullable()->default('')->change();

            $table->string('pressure')->nullable()->default('');
            $table->string('pulse')->nullable()->default('');
            $table->string('temperature')->nullable()->default('');
            $table->string('heart_frequency')->nullable()->default('');
            $table->string('breathing_frequency')->nullable()->default('')->change();
            $table->mediumText('physical_exam')->nullable()->default('')->change();
            $table->mediumText('oral_exam')->nullable()->default('')->change();



            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->unsignedBigInteger('id_patient');
            $table->timestamps();

            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
}
