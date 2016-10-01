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
        Schema::create('workingDays', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('day');
            
            $table->foreign('place_id')->references('id')->on('place');

            $table->foreign('working_days_id')->references('id')->on('workingDays');


            $table->timestamps();
        });
         
         Sore working days for places 
        Schema::create('place_workingDays', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('place_id')->unsigned()->nullable();
            $table->integer('working_days_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('place_workingDays',function (Blueprint $table){
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->foreign('working_days_id')->references('id')->on('workingDays')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                Schema::drop('workingDays');
                Schema::drop('place_workingDays');

    }
}
