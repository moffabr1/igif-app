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

/*
 * Original Route from Edwin's Class
 */
//Route::get('/', function () {
//    return view('welcome');
//});

/*
 * Route from SB Admin Theme
 */

Route::get('/', function()
{
    //return View::make('home');
    return View::make('welcome');
});

Route::auth();

//Route::get('/igif', 'HomeController@index');
//
//Route::resource('igif/admin/users', 'AdminUsersController');

//Route::resource('admin/users', 'AdminUsersController');


//Route::get('profile', function () {
//    // Only authenticated users may enter...
//
//    Route::get('/igif', 'HomeController@index');
//
//    Route::resource('/igif/admin/users', 'AdminUsersController');
//
//})->middleware('auth');

//Route::group(['middleware' => 'auth'], function () {

Route::group(['middleware' => 'igif'], function () {

//    Route::get('/igif', function ()    {
//        // Uses Auth Middleware
//    });

    Route::get('/igif', 'HomeController@index');

    //Route::resource('igif/admin/users', 'AdminUsersController');



    Route::get('/igif/charts', function()
    {
        return View::make('igif.mcharts');
    });

    Route::get('/igif/tables', function()
    {
        return View::make('igif.table');
    });

    Route::get('/igif/forms', function()
    {
        return View::make('igif.form');
    });

    Route::get('/igif/grid', function()
    {
        return View::make('igif.grid');
    });

    Route::get('/igif/buttons', function()
    {
        return View::make('igif.buttons');
    });


    Route::get('/igif/icons', function()
    {
        return View::make('igif.icons');
    });

    Route::get('/igif/panels', function()
    {
        return View::make('igif.panel');
    });

    Route::get('/igif/typography', function()
    {
        return View::make('igif.typography');
    });

    Route::get('/igif/notifications', function()
    {
        return View::make('igif.notifications');
    });

    Route::get('/igif/blank', function()
    {
        return View::make('igif.blank');
    });

    Route::get('/igif/documentation', function()
    {
        return View::make('igif.documentation');
    });
});

Route::group(['middleware' => 'admin'], function () {

    Route::resource('igif/admin/users', 'AdminUsersController');
    Route::resource('igif/admin/courses', 'AdminCoursesController');

});




//Route::get('/', function()
//{
//    return View::make('home');
//});

