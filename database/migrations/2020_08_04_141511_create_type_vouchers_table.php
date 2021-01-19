<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('document');
            $table->string('abbreviation');
            $table->string('serie');
            $table->integer('start');
            $table->integer('end');
            $table->integer('sequence');
            $table->enum('status',['activo','inactivo'])->default('activo');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_vouchers');
    }
}
