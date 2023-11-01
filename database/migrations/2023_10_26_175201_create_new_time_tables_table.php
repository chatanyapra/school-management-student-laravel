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
        Schema::create('new_time_tables', function (Blueprint $table) {
            $table->integer('Sno', true)->index('Sno');
            $table->string('class_name', 30);
            $table->string('periods', 30);
            $table->string('time_sub', 20);
            $table->string('Monday', 30);
            $table->string('Tuesday', 30);
            $table->string('Wednesday', 30);
            $table->string('Thursday', 30);
            $table->string('Friday', 30);
            $table->string('Saturday', 30);

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
        Schema::dropIfExists('new_time_tables');
    }
};
