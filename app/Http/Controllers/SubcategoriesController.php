<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use Request;
use App\Subcategory as Subcategory;
// use App\Subcategory as Subcategory;
class SubcategoriesController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function store(){

     	// return Request::all();
     	// $input=Request::all();
    	  // Subcategory::create(['subcategory_name'=>$input['subcategory_name'],'ctegory_id'=>$input['category_id']]);
    	  Subcategory::create(Request::all());
        return redirect('appconfig/categories');
    }
    
    public function show($id){
    	// return $id;
    	return Subcategory::where('category_id','=',$id)->get();

    }
}
