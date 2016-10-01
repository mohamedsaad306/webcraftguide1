<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use Request;
use App\Category As Category;
use App\Subcategory as Subcategory;
use App\ServiceTags as Tag;


class TagsController extends Controller
{
    //
  public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
    {
    	$categories=Category::lists('category_name','id');
        $subcategories=Subcategory::all('subcategory_name','id','category_id'); 


    	return view('config.tagsconfig',compact("categories","subcategories"));
    }

/*  to return sub-categories list associated with main category id 
    @id the main category id   */    
   public function GetsubcategoriesBycategoryId($id)
    {
        return Subcategory::where('category_id',$id)->lists('Subcategory_name','id');
    } 

   /* Create the new service tag  */
   public function store()
    {
        $input=Request::all();
        $tag= new Tag($input);
        $tag->save();
        return redirect('appconfig/tags');
        

    }


}
