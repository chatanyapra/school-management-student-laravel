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
        Schema::table('class_9_attendence', function (Blueprint $table) {
            $table->foreign(['registrNo_teacher'], 'register-teach')->references(['registrationNo'])->on('teachersdb')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['registrationNo'], 'register-no9')->references(['registrationNo'])->on('class_9db')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_9_attendence', function (Blueprint $table) {
            $table->dropForeign('register-teach');
            $table->dropForeign('register-no9');
        });
    }
};
