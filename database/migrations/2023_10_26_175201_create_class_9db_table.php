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
        Schema::create('class_9db', function (Blueprint $table) {
            $table->integer('Sno', true)->index('Sno');
            $table->bigInteger('registrationNo')->primary();
            $table->string('password', 13);
            $table->string('Name', 25);
            $table->string('fatherName', 25);
            $table->string('Email', 30);
            $table->integer('phoneNo');
            $table->integer('attendClass')->default(0);
            $table->integer('totalClass')->default(0);
            $table->integer('feesSubmitted')->default(0);
            $table->enum('ClassRegistration', ['Registered', 'Not Registered'])->default('Not Registered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_9db');
    }
};
