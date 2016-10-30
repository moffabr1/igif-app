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
        $scoresData = Scores::orderBy('round_date','desc')->take($n)->get();
        $scoresDataReversed = $scoresData->reverse();

        return View::make('igif.player.stats.index')
            ->with([
                'dates' => $scoresDataReversed->pluck('round_date'),
                'scores' => $scoresDataReversed->pluck('total_score')
            ]);

    }

        public function dochart() {

        }


}
