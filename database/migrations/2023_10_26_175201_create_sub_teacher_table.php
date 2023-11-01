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
        Schema::create('sub_teacher', function (Blueprint $table) {
            $table->integer('Sno', true);
            $table->bigInteger('regno_teach')->index('regno_teach');
            $table->string('classNameSub', 15)->index('class_name_teach');
            $table->string('sub_name', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_teacher');
    }
};
