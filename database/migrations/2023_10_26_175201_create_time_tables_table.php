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
        Schema::create('time_tables', function (Blueprint $table) {
            $table->integer('Sno', true);
            $table->string('className', 25)->index('class-name');
            $table->string('days_name', 12);
            $table->string('period-1', 25);
            $table->string('period-2', 25);
            $table->string('period-3', 25);
            $table->string('period-4', 25);
            $table->string('period-5', 25);
            $table->string('period-6', 25);
            $table->string('period-7', 25);
            $table->string('period-8', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_tables');
    }
};
