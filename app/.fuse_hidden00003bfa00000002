<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingDays extends Model
{
    //
        protected $fillable=[
    			'day',
    			'created_at',
    			'updated_at',
    ];
    protected $table='workingDays';
    public function places()
    {
        return $this->belongsToMany('App\Place','place_workingDays');
    }			
}
