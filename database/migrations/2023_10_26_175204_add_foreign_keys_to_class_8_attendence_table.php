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
        Schema::table('class_8_attendence', function (Blueprint $table) {
            $table->foreign(['registrNo_teacher'], 'register-teacher')->references(['registrationNo'])->on('teachersdb')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['registrationNo'], 'register-no8')->references(['registrationNo'])->on('class_8db')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_8_attendence', function (Blueprint $table) {
            $table->dropForeign('register-teacher');
            $table->dropForeign('register-no8');
        });
    }
};
