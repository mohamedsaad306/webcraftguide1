<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $fillable =[
							    'area_name',
							    'created_at',
							    ];

    protected $table = 'areas';

}
