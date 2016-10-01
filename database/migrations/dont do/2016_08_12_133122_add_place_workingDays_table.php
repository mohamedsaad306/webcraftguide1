<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlaceWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Sore working days for places 
        Schema::create('places_workingdays', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('place_id');
            $table->integer('workingdays_id');
            
            

            
        });
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
