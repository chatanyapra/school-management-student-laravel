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
        Schema::create('class_9_attendence', function (Blueprint $table) {
            $table->integer('Sno', true);
            $table->bigInteger('registrationNo')->index('register-no9');
            $table->bigInteger('registrNo_teacher')->index('register-teach');
            $table->dateTime('attendence_date')->useCurrent();
            $table->enum('attendence_status', ['Absent', 'Present']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_9_attendence');
    }
};
