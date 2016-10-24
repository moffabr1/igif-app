<?php

namespace App\Http\Controllers;

use App\Scores;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PlayerStatsController extends Controller
{
    //
    public function index()
    {
        $n = 20;
//        $scoresData = Scores::orderBy('round_date','asc')->get(); working
        $scoresData = Scores::orderBy('round_date','desc')->take($n)->get();
        $scoresDataReversed = $scoresData->reverse();

//        dd($scoresDataSorted);

        return View::make('igif.player.stats.index')
            ->with([
                // working
//                'dates' => $scoresData->pluck('round_date'),
//                'scores' => $scoresData->pluck('total_score')

                'dates' => $scoresDataReversed->pluck('round_date'),
                'scores' => $scoresDataReversed->pluck('total_score')
            ]);

    }
//        $n = 10;
//        $latest_posts = Post::orderBy('created_at', 'DESC')->take($n)->get();

    public function gir()
    {

    }





}
