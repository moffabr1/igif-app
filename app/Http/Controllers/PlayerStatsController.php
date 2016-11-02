<?php

namespace App\Http\Controllers;

use App\Classes\Stats;
use App\Scores;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

// Working code below
//    {
//        $n = 20;
//        $scoresData = Scores::orderBy('round_date','desc')->take($n)->get();
//        $scoresDataReversed = $scoresData->reverse();
//
////        dd($scoresDataReversed->pluck('total_score'));
//
//        return View::make('igif.player.stats.index')
//            ->with([
//                'dates' => $scoresDataReversed->pluck('round_date'),
//                'scores' => $scoresDataReversed->pluck('total_score')
//            ]);
//
//    }

    public function scoring() {
        //here I want to get a count of all the eagles, birdies, pars, bogeys ....
        //and show them in a bar graph
        $n = 20;
        $scoresData = Scores::orderBy('round_date','desc')->take($n)->get();
        $scoresDataReversed = $scoresData->reverse();

        $rounds = Stats::getUserRounds(Auth::user()->id);
        $cumulativeData = Stats::getCumulativeData($rounds);

//        dd($rounds);
//        dd($cumulativeData['total_eagles']);

//        return View::make('igif.player.stats.scoring', compact('cumulativeData'));
        return View::make('igif.player.stats.scoring')
            ->with(compact('cumulativeData'))
            ->with([
                'dates' => $scoresDataReversed->pluck('round_date'),
                'scores' => $scoresDataReversed->pluck('total_score')
            ]);


    }

    public function proximity() {

        return ("proximity");
    }



    public function fairways() {

        $fw_hit = Stats::fw_hit(10);

        $dates_data = array_pluck($fw_hit, 'round_date');
        $fw_hit_data = array_pluck($fw_hit, 'fw_hit');

        $new_dates_data = array_map(array($this, 'date_adj'), $dates_data);



        return View::make('igif.player.stats.fairways')
            ->with([
                'dates' => $new_dates_data,
                'fw_hit' => $fw_hit_data
            ]);
    }


    private function date_adj($dates_data){
        return(Carbon::parse($dates_data)->format('m/d/Y'). " ");
    }


}
