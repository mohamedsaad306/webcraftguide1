<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
      protected $fillable =[
							    'work_from',
							    'work_to',
							    'delivery',
							    'delivery_from',
							    'delivery_to',
							    'latitude',
							    'longitude',
							    'facebook_link',
							    'owner',
							    'created_at',
							    ];

    protected $table = 'settings';


    public function place()
    {
        return $this->belongsTo('App\Place');
    }    

}
