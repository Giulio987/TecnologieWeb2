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
            $table->id('id');
            $table->char('fiscal_code', '16')->unique();
            $table->date('dob');
            $table->string('phone_number','15')->unique();         
            $table->char('gender', '1');
            $table->string('street_address', '50');
            $table->string('street_number', '8');
            $table->string('postal_code', '5');
            $table->string('city', '30');
            $table->bigInteger('id_doctor')->unsigned();
            $table->bigInteger('id_user')->unsigned();

            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pazients');
    }
}
