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
            $table->id();
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_doctor');
            $table->unsignedBigInteger('id_treatment');
            $table->string('serie');
            $table->string('sequence_char');
            $table->string('sequence_int');
            $table->string('type_pay');
            $table->date('date_pay')->nullable();
            $table->integer('dues')->nullable();
            $table->double('received')->nullable();
            $table->double('turned')->nullable();
            $table->double('total')->default(0);
            $table->double('discount')->default(0);
            $table->double('subtotal')->default(0);
            $table->double('iva')->default(0);
            $table->enum('interval', ['mensual', 'quincenal', 'semanal', 'ninguno'])->default('ninguno');
            $table->enum('status', ['anulado', 'cancelado', 'pendiente', 'proceso'])->default('pendiente');
            $table->string('url_file')->nullable();
            $table->timestamps();
            $table->foreign('id_type')->references('id')->on('type_vouchers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_treatment')->references('id')->on('medical_treatments')->onDelete('cascade')->onUpdate('cascade');
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
