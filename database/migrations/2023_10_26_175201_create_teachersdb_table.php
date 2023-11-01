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
        Schema::create('teachersdb', function (Blueprint $table) {
            $table->integer('Sno', true)->index('Sno');
            $table->bigInteger('registrationNo')->primary();
            $table->string('password', 14);
            $table->string('Name', 25);
            $table->string('photo', 250)->default('none');
            $table->string('fatherName', 25);
            $table->string('Email', 30);
            $table->string('phoneNo', 13)->default('8500000000');
            $table->string('messageBox', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachersdb');
    }
};
