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
        Schema::create('class_8_attendence', function (Blueprint $table) {
            $table->integer('Sno', true);
            $table->bigInteger('registrationNo')->index('register-no8');
            $table->bigInteger('registrNo_teacher')->index('register-teacher');
            $table->dateTime('attendence_date')->useCurrent();
            $table->string('sub_name', 25);
            $table->enum('attendence_status', ['A', 'P']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_8_attendence');
    }
};
