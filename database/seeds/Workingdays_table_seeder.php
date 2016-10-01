<?php

use Illuminate\Database\Seeder;

class Workingdays_table_seeder 	 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$t=time();
		$ts=date("Y-m-d H:i:s",$t);
       DB::table('workingDays')->insert(

            [['day' =>'sat','created_at' => $ts,'updated_at' =>$ts],
            ['day' =>'sun','created_at' => $ts,'updated_at' =>$ts],
            ['day' =>'mon','created_at' => $ts,'updated_at' =>$ts],
            ['day' =>'tue','created_at' => $ts,'updated_at' =>$ts],
            ['day' =>'wed','created_at' => $ts,'updated_at' =>$ts],
            ['day' =>'thu','created_at' => $ts,'updated_at' =>$ts],
            ['day' =>'fri','created_at' => $ts,'updated_at' =>$ts]]
                    );        
    }
}
 