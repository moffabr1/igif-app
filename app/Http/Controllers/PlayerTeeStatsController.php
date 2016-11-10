<?php

namespace App\Http\Controllers;

use App\Classes\Rounds;
use App\Classes\Tee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PlayerTeeStatsController extends Controller
{
    //
    public function tee()
    {
        //Set the number of records we want
        $n = 10;
        //Grab the current logged in user
        $user = Auth::user()->id;
        //Grab the scores data
        $rounds = Rounds::roundsAll(Auth::user()->id, $n);
        $roundsReversed = $rounds->reverse();
        $scores_round_date = array_pluck($roundsReversed, 'round_date');
        $scores_round = array_pluck($roundsReversed, 'total_score');

//        dd($rounds);

        //Grab the Off the Tee data
        $offthetee_totals = Tee::offthetee_cum($user, $n);

        //Grab the Drive Distance Data per Round
        $drive_distance_round = Tee::drive_distance_round($user, $n);

        //Grab the fw hit data by round and date for all user rounds
        $fw_hit_round = Tee::fw_hit_round(null);

        $fw_hit_round_dates = array_pluck($fw_hit_round, 'round_date');
        $fw_hit_round_data = array_pluck($fw_hit_round, 'fw_hit');

        $driving_distance_avg_round = array_pluck($drive_distance_round, 'avg_driving_distance_round');

//        dd($driving_distance_avg_round);

        return View::make('igif.player.stats.tee')
            ->with([
                'fw_hit_round' => $fw_hit_round,
                'fw_hit_round_dates' => $fw_hit_round_dates,
                'fw_hit_round_data' => $fw_hit_round_data,
                'driving_distance_avg_round' => $driving_distance_avg_round,
                'offthetee_totals' => $offthetee_totals,
                'scores_round' => $scores_round,
                'scores_round_date' => $scores_round_date
            ]);
    }
}
