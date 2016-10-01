<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workingdays', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('day');
            
            $table->foreign('place_id')->references('id')->on('palces');

            $table->foreign('workingdays_id')->references('id')->on('workingDays');


            $table->timestamps();
        });
        Schema::table('places_workingdays',function (Blueprint $table){
            $table->foreign('place_id')->references('id')->on('palces');
            $table->foreign('workingdays_id')->references('id')->on('workingDays');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                Schema::drop('workingdays');

    }
}
