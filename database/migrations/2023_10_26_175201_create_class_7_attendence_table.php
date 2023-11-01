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
        Schema::create('class_7_attendence', function (Blueprint $table) {
            $table->integer('Sno', true);
            $table->integer('registrationNo')->index('registNo-7');
            $table->bigInteger('registrNo_teacher')->index('register-no-teacher');
            $table->timestamp('attendence_date')->useCurrent();
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
        Schema::dropIfExists('class_7_attendence');
    }
};
