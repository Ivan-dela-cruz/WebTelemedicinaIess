<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_doctor');
            $table->string('reason')->nullable();;
            $table->mediumText('medicines')->nullable();;
            $table->text('indications')->nullable();;
            $table->enum('status',['activo','inactivo'])->default('activo');;
            $table->timestamps();

            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
