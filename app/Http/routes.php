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

Route::get('/', 'NasabahController@index');
Route::get("/nasabah/test","NasabahController@test");

Route::resource('/test',"Testctrl");

Route::resource("/nasabah","NasabahController");
Route::post("nasabah/search","NasabahController@search");
Route::post("nasabah/store","NasabahController@store");

Route::get("auth","Auth\AuthController@getRegister");
Route::get("auth/register","Auth\AuthController@getRegister");
Route::post("auth/register","Auth\AuthController@postRegister");

Route::get("auth/login","Auth\AuthController@getLogin");
Route::post("auth/login","Auth\AuthController@postLogin");
Route::get("auth/logout","Auth\AuthController@getLogout");
Route::get("auth/status_login","Auth\AuthController@status_login");


Route::get("/dashboard",function(){
	
	return view("nasabah.dashboard");
		
});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
