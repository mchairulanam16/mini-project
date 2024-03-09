<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->integer('id_class')->unsign();
            $table->integer('id_subject')->unsign();
            $table->integer('id_user')->unsign();
            $table->integer('id_code');
            $table->string('teaching_role');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->integer('duration');
            $table->foreign('id_class')->references('id')->on('classes');
            $table->foreign('id_subject')->references('id')->on('subjects');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_code')->references('id')->on('codes');
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
        Schema::dropIfExists('absences');
    }
}
