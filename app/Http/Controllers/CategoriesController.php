<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Category as Category;
use App\Subcategory as Subcategory;


use Request;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$main_categories=Category::all();
	return view('config.categoriesconfig',array('main_categories'=>$main_categories) );
    
    }

    public function main_categories()
    {
        return Category::all();
    }

    public function store(){
    	  $input=Request::all();
    	  Category::create($input);
        return redirect('appconfig/categories');
    }

    public function showSubcategories($id){
    	$sub_categories=Subcategory::show($id);
    	$main_categories=Category::all();
    	return view ('config.categoriesconfig',array('main_categories'=>$main_categories,'sub_categories'=>$sub_categories));
    }



}
