<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
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
            $table->string('url_image')->nullable();
            $table->enum('status', ['activo', 'inactivo'])->default('activo');
            $table->string('email')->unique();


            $table->string('academic_title')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('marital_status')->nullable();
            $table->mediumText('biography')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_specialty');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('doctors');
    }
}
