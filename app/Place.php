<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    protected $fillable=[
    				'place_name',
    				'description',
    				'address',
    				'tel_number',
    				'area_id',
    				'category_id',
    				'facebook_link'
    ];

	
	/* Comment */
    public function subcategories()
    {
    		return $this->belongsToMany('App\Subcategory','place_subcategory');
    }

    public function serviceTags()
    {
    		return $this->belongsToMany('App\ServiceTags','place_servicetags');
    }

    public function setting()
    {
        return $this->hasOne('App\Setting');
    }    
}
