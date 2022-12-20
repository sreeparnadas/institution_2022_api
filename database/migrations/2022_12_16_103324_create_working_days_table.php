<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_days', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable(true)->references('id')->on('users')->onDelete('cascade');
            $table->integer('count_days');
            $table->integer('total_days');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description', 255);

            $table->tinyInteger('inforce')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_days');
    }
}
