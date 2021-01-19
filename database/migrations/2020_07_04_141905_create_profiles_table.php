<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ruc')->nullable();;
            $table->string('address')->nullable();
            $table->string('owner')->nullable();
            $table->string('ci')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobil')->nullable();
            $table->string('facebook')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('url_whatsapp')->nullable();
            $table->string('url_web')->nullable();
            $table->string('url_logo')->nullable();
            $table->string('url_background')->nullable();
            $table->date('origin')->nullable();
            $table->double('iva')->default(0);
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
        Schema::dropIfExists('profiles');
    }
}
