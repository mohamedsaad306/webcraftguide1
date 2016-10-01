<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
// use Request;
use App\Http\Requests;
use App\Place As Place;
use App\Area As Area;
use App\Category As Category;
use App\Subcategory As Subcategory;
use App\ServiceTags AS ServiceTags;
use Image;

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
    public function store(Request $request)
    {
    	$input=$request->all();
    	$place= Place::create($input);
    	$place->subcategories()->attach($input['subcategories']); 
        $place->setting()->create([
            "facebook_link"=>"CraftSolution"
            ]);
    	return redirect('/places/new/');
    }

    /* view all places at  catego */
    public function view()
    {
        // $places=Place::all();
        $places=Place::paginate(10);
        return view('place.view',compact('places'));
    }

    /* View place in edit mode  */
    public function showPlaceIneditMode($id,$editType ='basic')
    {
        $place_toEdit=Place::find($id);

        $areas=Area::lists('area_name','id');
        $categories=Category::lists('category_name','id');
        $subcategories=Subcategory::all('subcategory_name','id','category_id');

        // get avilable service tags according to place sub category 
        if(isset($place_toEdit['subcategories'])){
            
            // extracting sub categories ids
            $subcats=[]; 
            foreach ($place_toEdit['subcategories']as $key => $value) {
                array_push($subcats, $value['id']);
            }
            $avilableServicetags=ServiceTags::avilableServicetags($subcats);
        }

        $servicetags=ServiceTags::all();
        
        //editing page 
        
        // editing basic data view     
        if ($editType=='basic'){
        return view('place.edit_basics',compact('id','areas','categories','subcategories','avilableServicetags','place_toEdit','editType'));
        
        }
        else if ($editType=='images') {
            
        return view('place.edit_images',compact('id','areas','categories','subcategories','avilableServicetags','place_toEdit','editType'));
                    }
        
        elseif ($editType=='options') {
        
        return view('place.edit_options',compact('id','areas','categories','subcategories','avilableServicetags','place_toEdit','editType'));
            
        }

    }


    /* edit the place basic data   */
    public function updatePlaceBasics(Request $request)
    {
        $input=$request->all();
        
        $place = Place::find($input['id']);
        
        $place->place_name=$input['place_name'];
        $place->description=$input['description'];  
        $place->address=$input['address'];
        $place->tel_number=$input['tel_number'];
        $place->area_id=$input['area_id'];
        $place->category_id=$input['category_id'];
        $place->subcategories()->detach();
        $place->subcategories()->attach($input['subcategories']);
        $place->save();

        return redirect ('/places/edit/'.$input['id']);
    }

    public function updatePlaceIcon( Request $request )
    {
        
        
        if($request->hasFile('iconImg')){
            $icon=$request->file('iconImg');
            $img_name=time().'.'.$icon->getClientOriginalExtension();
            Image::make($icon)->resize(250,250)->save(public_path('/images/iconImgs/'.$img_name));
            $place=Place::find($request['id']);
            $place->iconImg=$img_name;
            $place->save();
            return redirect('/places/edit/'.$request['id'].'/images');
        }else{return 'no file '.print_r($request); }
    }

    /* update Place Options  */
    public function updatePlaceOptions(Request $request)
    {       
        $input=$request->all();
        $place = Place::find($input['id']);

        // if (isset($input['workingDays'])) {
            
        // }
        // if (isset($input['serviceTags'])) {
            
        // }
        // if (isset($input['latitude'] && isset($input['longitude']))) {
            
        // }
        // if (isset($input['delivery'])) {
            
        // }
        // if (isset($input[''])) {
            
        // }
        // if (isset($input[''])) {
            
        // }        

        return $input;
    }

}
