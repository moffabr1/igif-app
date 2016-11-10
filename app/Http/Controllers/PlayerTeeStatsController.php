<?php

namespace App\Http\Controllers;

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
        //Grab the current logged in user
        $user = Auth::user()->id;

        //Grab the Driving Distance Data per Round
//        $drive_distance_round = Tee::drive_distance_round($user, 10);


        //Grab the fw hit data by round and date for all user rounds
        $fw_hit_round = Tee::fw_hit_round(null);

        //Grab the Off the Tee data
        $offthetee_data = Tee::offthetee_totals($user, null);

        //Grab the Drive Distance Data per Round
        $drive_distance_round = Tee::drive_distance_round($user, null);


        dd($drive_distance_round);

//dd($scrambling_data);

        return View::make('igif.player.stats.tee')
            ->with([
//                'putting_dates' => $new_putting_dates,
//                'putting_data' => $putting_data,
//                'zeroputts' => $total_zeroputts,
//                'oneputts' => $total_oneputts,
//                'twoputts' => $total_twoputts,
//                'threeputts' => $total_threeputts,
//                'total_putts_round' => $total_putts_round,
                'offthetee_data' => $offthetee_data
//
            ]);
    }
}
