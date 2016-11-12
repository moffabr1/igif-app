<?php

namespace App\Http\Controllers;

use App\Classes\Rounds;
use App\Classes\Scoring;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PlayerStatsScoringController extends Controller
{
    //

    public function scoring()
    {
        $scoring_data_array[] = 0;
        $n = 20;

        $rounds = Rounds::roundsAll(Auth::user()->id, $n);
        $roundsReversed = $rounds->reverse();

        $scoring_cum = Scoring::scoring_cum(Auth::user()->id, $n);


        return View::make('igif.player.stats.scoring2')
//            ->with(compact('cumulativeData'))
            ->with([
                'dates' => $roundsReversed->pluck('round_date'),
                'scores' => $roundsReversed->pluck('total_score')
            ]);





//        return $scoring_data_array;
    }
}
