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
        Schema::table('class_7_attendence', function (Blueprint $table) {
            $table->foreign(['registrNo_teacher'], 'register-no-teacher')->references(['registrationNo'])->on('teachersdb')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['registrationNo'], 'registNo-7')->references(['registrationNo'])->on('class_7db')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_7_attendence', function (Blueprint $table) {
            $table->dropForeign('register-no-teacher');
            $table->dropForeign('registNo-7');
        });
    }
};
