<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get( '/' , function () {

    return view('welcome');

});


Route::get('/backoffice', 'Backoffice\BackofficeController@login' );

Route::get('/backoffice/users/', 'Backoffice\TravelController@viewusers');
Route::get('/backoffice/users/delete/{id}', 'Backoffice\TravelController@deleteusers');

Route::get('/backoffice/travel/','Backoffice\TravelController@viewtravel');
Route::get('/backoffice/travel/add', 'Backoffice\TravelController@addtravel' );
Route::post('/backoffice/travel/add', 'Backoffice\TravelController@savetravel');

Route::get('/backoffice/travel/edit/{id}', 'Backoffice\TravelController@edittravel' );
Route::post('/backoffice/travel/edit/{id}', 'Backoffice\TravelController@updatetravel' );
Route::get('/backoffice/travel/delete/{id}', 'Backoffice\TravelController@deletetravel' );

//Route::get('/backoffice/category/add', function(){  return view('addcategory'); });
Route::get('/backoffice/category/add', 'Backoffice\TravelController@viewcategory');
Route::post('/backoffice/category/add', 'Backoffice\TravelController@addcategory');
Route::get('/backoffice/category/edit/{id}', 'Backoffice\TravelController@editcategory');
Route::post('/backoffice/category/edit/{id}', 'Backoffice\TravelController@updatecategory');
Route::get('/backoffice/category/delete/{id}', 'Backoffice\TravelController@deletecategory');

Route::post('/backoffice/uploadimage' ,  'Backoffice\TravelController@uploadimage' );


//----------------------- API
Route::post('/api/login', 'Api\UserController@login');
Route::post('/api/register', 'Api\UserController@register');

Route::get('/api/alltravel', 'APIController@getAllTravel');
Route::get('/api/travel/{id}', 'APIController@getTravelById');
Route::get('/api/travelbycategory/{category}', 'APIController@getTravelByCategoryId');
Route::get('/api/travelbykidsage/{kidsage}', 'APIController@getTravelByKidsageId');




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
