<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
	    //
    protected $fillable =[
							    'subcategory_name',
							    'created_at',
							    'category_id',
							    ];

    protected $table = 'subcategories';

    public static function show($id){
    	// return $id;
    	return Subcategory::where('category_id','=',$id)->get();

    }

    /* Tags relation @return:: associated tags to the calling subcategory  */

    public function tags(){
        return $this->hasMany('App\Servicetags');
    }

        /* Many 2 Many relation with place model  */
        
    public function places()
    {
        return $this->belongsToMany('App\Place','place_subcategory');
    }
}
