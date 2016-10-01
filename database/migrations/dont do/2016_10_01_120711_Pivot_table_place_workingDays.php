<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotTablePlaceWorkingDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Sore working days for places 
        Schema::create('place_workingDays', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('place_id');
            $table->integer('workingDays_id');

            $table->foreign('place_id')->references('id')->on('palces');
            $table->foreign('workingDays_id')->references('id')->on('workingDays');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
 
    Schema::drop('place_workingDays');
    }
}
