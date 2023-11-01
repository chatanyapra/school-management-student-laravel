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
        Schema::create('allclassdb', function (Blueprint $table) {
            $table->integer('Sno', true)->index('sno_inc');
            $table->string('classdb', 14);
            $table->string('className', 15)->unique('className');
            $table->string('class_attendence', 30);
            $table->bigInteger('class_teacher')->index('choose_class_teacher');

            $table->primary(['Sno']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allclassdb');
    }
};
