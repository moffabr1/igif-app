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


use Illuminate\Support\Facades\Input;

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


    Route::resource('igif/player/scores', 'PlayerScoresController');
    Route::resource('igif/player/scorecards', 'PlayerScorecardsController');

    Route::get('/igif/player/stats', 'PlayerStatsController@index');
    Route::get('/igif/player/stats/gir', 'PlayerStatsController@gir');
//    Route::get('/igif/player/stats/scoreCategories', 'PlayerStatsController@scoreCategories')->name('scorecategories');
    Route::get('/igif/player/stats/catdata', 'PlayerStatsController@scoreCategories')->name('scorecategories');
    Route::get('/igif/player/stats/proximity', 'PlayerStatsController@proximity')->name('proximity');
    Route::get('/igif/player/stats/fairways', 'PlayerStatsController@fairways')->name('fairways');



//    Route::get('/igif/player/scores/cards', 'PlayerScoresCardsController@index');

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

    Route::get('/ajax-call', function(){

        if(Input::get('state') != '') {

            $id = Request::get('state');
//            $clubs = \App\Club::where('state_province_name', '=', $id )->get();
            $clubs = \App\Club::where('state_province_name', '=', $id )->orderBy('club_name', 'ASC')->get();
            return Response::json($clubs);

        }
        elseif (Input::get('club_id') != '') {

            $id = Request::get('club_id');
            $courses = \App\Course::where('club_id', '=', $id )->orderBy('course_name', 'ASC')->get();
            return Response::json($courses);
        }
        elseif (Input::get('course_id') != '') {

            $id = Request::get('course_id');
            $scorecards = \App\Scorecard::where('course_id', '=', $id )->get();
            return Response::json($scorecards);
        }
        elseif (Input::get('scorecard_id') != '') {

            $id = Request::get('scorecard_id');
            $scorecards = \App\Scorecard::where('id', '=', $id )->get();
            return Response::json($scorecards);
        }


    });

});

Route::group(['middleware' => 'admin'], function () {

    Route::get('igif/admin/clubs/autocomplete', ['uses' => 'AdminClubsController@autocomplete', 'as' => 'igif.admin.clubs.autocomplete']);

    Route::resource('igif/admin/users', 'AdminUsersController');
    Route::resource('igif/admin/courses', 'AdminCoursesController');
    Route::resource('igif/admin/clubs', 'AdminClubsController');
    Route::resource('igif/admin/scorecards', 'AdminScorecardsController');

});


//Route::get('/', function()
//{
//    return View::make('home');
//});

