<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceTags extends Model
{
	protected $table = 'servicetags';
	protected $fillable=[
							'servicetag_name',
							'subcategory_id',
							];

    public function subcategory()
    {
    	return $this->belongsTo('App\Subcategory');
    }

    // get avliable service tags according to sub categories 
    public static function avilableServicetags($subcategories) 
    {
      // $servicetags=[];
      // foreach ($subcategories as $key ) {
          
        return $tags=Servicetags::whereIN('subcategory_id',$subcategories)->lists('id','servicetag_name');
      //   array_push($servicetags, $tags);
      // }
      // return $servicetags;
      
    }
}
