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
//    "total_fw_opportunities" => 112
//    "total_fw_hit" => 61
//    "total_fw_percentage" => 0.54464285714286
//    "total_fw_percentage_formatted" => "54%"
//    "total_drive_distance" => 19214
//    "total_drive_distance_opportunities" => 82
//    "avg_drive_distance_all_rounds" => 234.31707317073
        $offthetee_totals = Tee::offthetee_cum($user, $n);

        $fw_hit_percentage_total = number_format($offthetee_totals['total_fw_percentage'], 2) * 100;
        $fw_miss_percentage_total = 100 - $fw_hit_percentage_total;
        $total_fw_opportunities = $offthetee_totals['total_fw_opportunities'];
        $total_fw_hit = $offthetee_totals['total_fw_hit'];

//        dd($fw_hit_percentage_total);

        //Grab the Drive Distance Data per Round
        $drive_distance_round = Tee::drive_distance_round($user, $n);

        //Grab the fw hit data by round and date for all user rounds
        $fw_hit_round = Tee::fw_hit_round(null);

        $fw_hit_round_dates = array_pluck($fw_hit_round, 'round_date');
        $fw_hit_round_data = array_pluck($fw_hit_round, 'fw_hit');

//        dd($fw_hit_round);

        $driving_distance_avg_round = array_pluck($drive_distance_round, 'avg_driving_distance_round_wholenumber');

//        dd($driving_distance_avg_round);

        return View::make('igif.player.stats.tee')
            ->with([
                'fw_hit_round' => $fw_hit_round,
                'fw_hit_round_dates' => $fw_hit_round_dates,
                'fw_hit_round_data' => $fw_hit_round_data,
                'driving_distance_avg_round' => $driving_distance_avg_round,
                'offthetee_totals' => $offthetee_totals,
                'scores_round' => $scores_round,
                'scores_round_date' => $scores_round_date,
                'total_fw_hit_percentage' => $fw_hit_percentage_total,
                'total_fw_miss_percentage' => $fw_miss_percentage_total,
                'total_fw_opportunities' => $total_fw_opportunities,
                'total_fw_hit' => $total_fw_hit
            ]);
    }
}
