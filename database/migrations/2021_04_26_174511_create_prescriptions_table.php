<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('rfe')->unsigned();
            $table->bigInteger('id_patient')->unsigned();
            $table->bigInteger('id_doctor')->unsigned();
            $table->string('description');
            $table->string('status');
            $table->date('date');
            $table->string('type');
            $table->timestamps();

            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
