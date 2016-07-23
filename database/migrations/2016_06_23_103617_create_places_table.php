<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('place_name');
            $table->string('description');
            $table->string('address');
            $table->string('tel_number');
            $table->string('facebook_link');

            $table->integer('area_id')->unsigned();
            $table->integer('category_id')->unsigned();
                
            $table->timestamps();  // created @ 




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('places');
    }
}
