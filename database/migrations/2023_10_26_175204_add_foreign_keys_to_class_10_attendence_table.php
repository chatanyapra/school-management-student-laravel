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
        Schema::table('class_10_attendence', function (Blueprint $table) {
            $table->foreign(['registrNo_teacher'], 'register-no-teac10')->references(['registrationNo'])->on('teachersdb')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['registrationNo'], 'registNo-10')->references(['registrationNo'])->on('class_10db')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_10_attendence', function (Blueprint $table) {
            $table->dropForeign('register-no-teac10');
            $table->dropForeign('registNo-10');
        });
    }
};
