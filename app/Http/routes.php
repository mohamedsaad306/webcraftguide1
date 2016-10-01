<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
 

Route::group(['middleware'=>'web'],function(){

Route::auth();

Route::get('/', function () {	
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

/*=============================================
=            App Configuration                =
=============================================*/

/* application configuration home */
Route::get('/appconfig',function(){ return view('config.appconfig');} )->middleware('auth');

/* Area Configuration home   */
Route::get('/appconfig/area','AreasController@index');

// Route::get('/appconfig/area','AreasController@areaconfig');

/* create new app area   */
Route::post('/appconfig/area','AreasController@store');

/* Category  Configuration Routes   */	
Route::get('/appconfig/categories','CategoriesController@index');

/* create new app main category  */
Route::post('/appconfig/categories/create_main','CategoriesController@store');

/* create new  sub  category  */
Route::post('/appconfig/categories/create_subcategory','SubcategoriesController@store');

/* get sub categories when click on main category  */
Route::get('/appconfig/categories/{id}','CategoriesController@showSubcategories');

/* service tags home   */
Route::get('/appconfig/tags','TagsController@index');

/* get sub category list associated with main category id for JQuary to fill drop down menu  */
Route::get('/appconfig/subcategories/{id}','TagsController@GetsubcategoriesBycategoryId');

/* create new  servicetag  */
Route::post('/appconfig/tags/create_servicetag','TagsController@store');

/*=====  End of App Configuration  ======*/


/*============================================
=            Manage Place Routes             =
============================================*/
/* Manage places home  */

Route::get('/places','PlaceController@index');

/* new places view   */
Route::get('/places/new','PlaceController@newPlace');

/* Create new place  */
Route::post('/place/new/create','PlaceController@store');
														
/* View places view showing all places  */
Route::get('/places/view','PlaceController@view');

/* view place in edit mode  */
Route::get('places/edit/{id}/{editType?}','PlaceController@showPlaceIneditMode');

/* save place basic data update  */
Route::post('/places/updatebasic','PlaceController@updatePlaceBasics');

/* save place icon image   */
Route::post('/places/updateicon','PlaceController@updatePlaceIcon');

/* Place working options  */
Route::post('/places/updateoptions','PlaceController@updatePlaceOptions');
/*=====  End of Manage Place Routes   ======*/

});










