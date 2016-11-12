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


        return View::make('igif.player.stats.scoring')
//            ->with(compact('cumulativeData'))
            ->with([
                'dates' => $roundsReversed->pluck('round_date'),
                'scores' => $roundsReversed->pluck('total_score'),
                'scoring_cum' => $scoring_cum
            ]);

//  "lowest_round" => 73
//  "scoring_avg" => 76.44
//  "total_rounds" => 9
//  "total_holes" => 162
//  "total_strokes" =>
//  "front_9_scoring_avg" => "37.4"
//  "back_9_scoring_avg" => "39.0"
//  "bounce_back_total" => 41
//  "total_bogey_or_worse" => 63
//  "total_bounce_back_pctg" => "0.65"
//  "total_pars" => 91
//  "total_birdies" => 8
//  "total_eagles" => 0
//  "total_dbleagles" => 0
//  "total_bogeys" => 60
//  "total_dblbogeys" => 3
//  "total_3plusbogeys" => 0
//  "total_pars_round" => "10.11"
//  "total_birdies_round" => "0.89"
//  "total_eagles_round" => "0.00"
//  "total_dbleagles_round" => "0.00"
//  "total_bogeys_round" => "6.67"
//  "total_dblbogeys_round" => "0.33"
//  "total_3plusbogeys_round" => "0.00"
//  "total_bogeys_hole" => "0.37"
//  "total_pars_hole" => "0.56"
//  "total_birdies_hole" => "0.05"
//  "total_par_or_better_pctg" => "0.61"

    }
}
