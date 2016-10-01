<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('places', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('area_id')->references('id')->on('areas');
        });

        Schema::table('place_servicetags', function($table) {
            //
            // $table->foreign('servicetags_id')->references('id')->on('servicetags');
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
