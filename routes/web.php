<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('import','importfileController@display');
Route::post('courseImport','importCourseController@store');
Route::post('gnrtn', 'routineGenerateController@shw');
Route::post('gnrtn/d2', 'routineGenerateController@shw2');

Route::get('crs', 'importCourseController@index');
Route::get('gnrtn', 'routineGenerateController@error');
Route::get('gnrtn/d2', 'routineGenerateController@error');
Route::resource('/','importfileController');
Route::get('rtn', 'routineGenerateController@index');
Route::get('newview', 'routineController@index');
Route::get('newview/load_section','routineController@getSection');
Route::get('newview/gtrnt','routineController@getRoutine');
Route::get('get_api', 'apiController@index');




Route::post('gnrtn/pdf','PdfGenerateController@index');
Route::post('gnrtn/pdf/d2','pdfGenerateControllerTwo@index');

Route::get('gnrtn/pdf',function ()
{
	return redirect('/');
});

Route::get('donate',function ()
{
	return view('donation');
});

Route::get('team',function ()
{
	return view('team');
});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// for comment
// Route::get('/videos/{video}', 'VideoController@show')->middleware('auth');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
