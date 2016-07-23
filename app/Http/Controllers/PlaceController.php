<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Place As Place;
use App\Area As Area;
use App\Category As Category;
use App\Subcategory As Subcategory;


class PlaceController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
    //

    public function index()
    {
    	return view('place.home');
    }

    public function newPlace()
    {
    	/* Retrive Categories lists & areas lists to fill dropdown menus in creation form   */

    	$areas=Area::lists('area_name','id');
    	$categories=Category::lists('category_name','id');

    	return view('place.newplace',compact('areas','categories'));
    }
    public function store()
    {
    	$input=Request::all();
    	$place= Place::create($input);
    	$place->subcategories()->attach($input['subcategories']); 
    	return redirect('/places/new/');
    }

    /* view all places at  catego */
    public function view()
    {
        $places=Place::all();
        return view('place.view',compact('places'));
    }

    /* View place in edit mode  */
    public function showPlaceIneditMode($id)
    {
        $areas=Area::lists('area_name','id');
        $categories=Category::lists('category_name','id');
        $subcategories=Subcategory::all('subcategory_name','id','category_id');
        $place_toEdit=Place::find($id);

        return view('place.edit',compact('id','areas','categories','subcategories','place_toEdit'));
    }

}
