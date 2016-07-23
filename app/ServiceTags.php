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

}
