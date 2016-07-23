<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Area as Area;
use Request;

class AreasController extends Controller
{
    //
 public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 public function index()
	{
            
        $areas=Area::all();
         return view('config.areaconfig',array('areas'=>$areas));
    }
 public function areaconfig(){
		return view('config.areaconfig');
	}

 public function store(){
    $input=Request::all();
    Area::create($input);
        return redirect('appconfig/area');
 }

}
