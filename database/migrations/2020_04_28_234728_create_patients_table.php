<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->unique();
            $table->string('type_document');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['masculino', 'femenino']);
            $table->string('address');
            $table->string('province');
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('url_image')->nullable();
            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->string('email')->unique();

            $table->string('instruction')->nullable();
            $table->string('marital_status')->nullable();;
            $table->string('job')->nullable();
            $table->string('blood_type')->nullable();
            $table->mediumText('observation')->nullable();
            $table->mediumText('history_medical')->nullable();;
            $table->string('allergy')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
