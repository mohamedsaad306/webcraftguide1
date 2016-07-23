<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllteringTablesWithNullableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function($table) {
            $table->string('description')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('tel_number')->nullable()->change();
            $table->string('facebook_link')->nullable()->change();

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
