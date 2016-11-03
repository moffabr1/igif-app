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
//dd($scoresData);
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

//        $user = Auth::user()->id;
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

    public function fairways() {

        $fw_hit = Stats::fw_hit(10);
        $dates_data = array_pluck($fw_hit, 'round_date');
        $fw_hit_data = array_pluck($fw_hit, 'fw_hit');
        $new_dates_data = array_map(array($this, 'date_adj'), $dates_data);

        $n = 20;
        $scoresData = Scores::orderBy('round_date','desc')->take($n)->get();
        $scoresDataReversed = $scoresData->reverse();

        return View::make('igif.player.stats.fairways')
            ->with([
                'dates' => $new_dates_data,
                'fw_hit' => $fw_hit_data,
//                'dates' => $scoresDataReversed->pluck('round_date'),
                'scores' => $scoresDataReversed->pluck('total_score')
            ]);
    }

    public function gir() {

        $gir = Stats::gir(10);
        $gir_dates = array_pluck($gir, 'round_date');
        $gir_data = array_pluck($gir, 'gir');
        $new_gir_dates = array_map(array($this, 'date_adj'), $gir_dates);

        $rounds = Stats::getUserRounds(Auth::user()->id);
        $cumulative_data = Stats::getCumulativeData($rounds);

        $total_gir = $cumulative_data['total_gir'];

        $total_gir_hit = $cumulative_data['total_gir_hit'];
        $total_gir_missed = $total_gir - $total_gir_hit;

        $n = 20;
        $scoresData = Scores::orderBy('round_date','desc')->take($n)->get();
        $scoresDataReversed = $scoresData->reverse();

//        dd($total_gir_missed);


        return View::make('igif.player.stats.gir')
            ->with([
                'gir_dates' => $new_gir_dates,
                'gir' => $gir_data,
                'total_gir' => $total_gir,
                'total_gir_hit' => $total_gir_hit,
                'total_gir_missed' => $total_gir_missed,
                'scores' => $scoresDataReversed->pluck('total_score')
            ]);

    }
    public function putting() {

        $n = 10;
        $putting = Stats::putting($n);

        $putting_dates = array_pluck($putting, 'round_date');
        $new_putting_dates = array_map(array($this, 'date_adj'), $putting_dates);

        $putting_data = array_pluck($putting, 'putts');


        $total_putting_data = Stats::getCumulativeData(Stats::getUserRounds(Auth::user()->id));

        $total_putts = $total_putting_data['total_putts'];
        $total_putts_round = $total_putting_data['total_putts_round'];
        $total_putts_hole = $total_putting_data['total_putts_hole'];
        $total_putts_gir = $total_putting_data['total_putts_gir'];
        $total_threeputts = $total_putting_data['total_threeputts'];
        $total_threeputts_round = $total_putting_data['total_threeputts_round'];

        $total_zeroputts = $total_putting_data['total_zeroputts'];
        $total_oneputts = $total_putting_data['total_oneputts'];
        $total_twoputts = $total_putting_data['total_twoputts'];


//        dd($putting);


        return View::make('igif.player.stats.putting')
            ->with([
                'putting_dates' => $new_putting_dates,
                'putting_data' => $putting_data,
                'zeroputts' => $total_zeroputts,
                'oneputts' => $total_oneputts,
                'twoputts' => $total_twoputts,
                'threeputts' => $total_threeputts,

            ]);

//        dd(number_format($total_putts_hole, 2));

//        dd($rounds);
//        dd($putting);




    }








    public function proximity() {

        return ("proximity");
    }

    private function date_adj($dates_data){
        return(Carbon::parse($dates_data)->format('m/d/Y'). " ");
    }



}
