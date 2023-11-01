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
        Schema::create('class_8db', function (Blueprint $table) {
            $table->integer('Sno', true)->index('Sno_2');
            $table->bigInteger('registrationNo')->primary();
            $table->string('password', 13);
            $table->string('Name', 25);
            $table->string('photo', 400);
            $table->string('fatherName', 25);
            $table->string('Email', 30);
            $table->string('phoneNo', 14);
            $table->integer('attendClass')->default(0);
            $table->integer('totalClass')->default(0);
            $table->integer('feesSubmitted')->default(0);
            $table->enum('ClassRegistration', ['Registered', 'Not Registered']);

            $table->index(['Sno'], 'Sno_3');
            $table->index(['Sno'], 'Sno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_8db');
    }
};
