<?php

use Illuminate\Support\Facades\Input;

Route::get('/', function()
{
    return View::make('welcome');
});

Route::auth();

Route::group(['middleware' => 'igif'], function () {

    Route::resource('igif/player/scores', 'PlayerScoresController');
    Route::resource('igif/player/scorecards', 'PlayerScorecardsController');

    Route::get('/igif/player/stats', 'PlayerStatsController@index');
    Route::get('/igif/player/stats/gir', 'PlayerStatsController@gir');
    Route::get('/igif/player/stats/scoring', 'PlayerStatsController@scoring')->name('scoring');
    Route::get('/igif/player/stats/scoring2', 'PlayerStatsScoringController@scoring')->name('scoring2');

    Route::get('/igif/player/stats/proximity', 'PlayerStatsController@proximity')->name('proximity');

    Route::get('/igif/player/stats/fairways', 'PlayerStatsController@fairways')->name('fairways');
    Route::get('/igif/player/stats/tee', 'PlayerTeeStatsController@tee')->name('tee');

    Route::get('/igif/player/stats/gir', 'PlayerStatsController@gir')->name('gir');
    Route::get('/igif/player/stats/putting', 'PlayerStatsController@putting')->name('putting');
    Route::get('/igif/player/stats/proximity', 'PlayerStatsController@proximity')->name('proximity');
    Route::get('/igif/player/stats/scrambling', 'PlayerScramblingStatsController@scrambling')->name('scrambling');

//    Route::get('/igif/player/stats/dashboard', function()
//    {
//        return View::make('igif.player.stats.dashboard');
//    });


    Route::get('/igif', 'HomeController@index');
    Route::get('/ajax-call', function(){

        if(Input::get('state') != '') {

            $id = Request::get('state');
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

