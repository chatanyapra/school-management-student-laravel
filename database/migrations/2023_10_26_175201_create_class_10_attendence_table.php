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
        Schema::create('class_10_attendence', function (Blueprint $table) {
            $table->integer('Sno', true);
            $table->bigInteger('registrationNo')->index('registNo-10');
            $table->bigInteger('registrNo_teacher')->index('register-no-teac10');
            $table->timestamp('attendence_date')->useCurrentOnUpdate()->useCurrent();
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
        Schema::dropIfExists('class_10_attendence');
    }
};
