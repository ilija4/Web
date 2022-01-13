<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorWhoSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_who_season', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('poster_url');
            $table->integer('season');
            $table->integer('year');
            $table->integer('doctorNumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_who_season');
    }
}
