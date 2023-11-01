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
        Schema::table('sub_teacher', function (Blueprint $table) {
            $table->foreign(['regno_teach'], 'register_teacher')->references(['registrationNo'])->on('teachersdb');
            $table->foreign(['classNameSub'], 'class_name_teach')->references(['className'])->on('allclassdb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_teacher', function (Blueprint $table) {
            $table->dropForeign('register_teacher');
            $table->dropForeign('class_name_teach');
        });
    }
};
