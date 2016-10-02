<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('settings', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            
            $table->string('open247')->nullable();
            $table->time('work_from')->nullable();
            $table->time('work_to')->nullable();
            
            $table->string('delivery')->nullable();
            $table->time('delivery_from')->nullable();
            $table->time('delivery_to')->nullable();
            
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            
            $table->string('facebook_link')->nullable();


            $table->integer('owner')->default(1)->nullable();
            
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
        Schema::table('settings',function(Blueprint $table){
            
        $table->dropForeign('settings_place_id_foreign');
        });   
    Schema::drop('settings');
    
    }
}
