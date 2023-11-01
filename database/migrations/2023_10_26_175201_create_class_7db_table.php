<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_7db', function (Blueprint $table) {
            $table->integer('Sno', true)->index('sno');
            $table->integer('registrationNo')->primary();
            $table->string('password', 25);
            $table->string('Name', 25);
            $table->string('photo', 400)->default('none');
            $table->string('fatherName', 25);
            $table->string('Email', 30);
            $table->string('phoneNo', 14);
            $table->integer('attendClass')->default(0);
            $table->integer('totalClass')->default(0);
            $table->integer('feesSubmitted')->default(0);
            $table->enum('ClassRegistration', ['Not Registered', 'Registered']);
            $table->string('quizUploaded', 16)->default('none');
            $table->integer('quiz_attendQuestion')->default(0);
            $table->integer('quiz_correct_ans')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_7db');
    }
};
