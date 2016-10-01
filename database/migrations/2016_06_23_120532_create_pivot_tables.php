    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* palce - Sub  category pivot table  */
        
        Schema::create('place_subcategory', function (Blueprint $table) {
            $table->integer('place_id')->unsigned()->index();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->integer('subcategory_id')->unsigned()->index();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            
            //
        });

         // palce - service tags  pivot table  

        Schema::create('place_servicetags', function (Blueprint $table) {
            
            $table->integer('place_id')->unsigned()->index();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->integer('service_tags_id')->unsigned()->index();
            $table->foreign('service_tags_id')->references('id')->on('servicetags')->onDelete('cascade');
            
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
        //
    }
}
