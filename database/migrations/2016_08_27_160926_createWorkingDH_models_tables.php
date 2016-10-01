<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingDHModelsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('workingDays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day');
            // $table->timestamps();
        });
        // Schema::create('workingHours', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('servicetag_name');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
