<?php

namespace App\Http\Controllers;

use App\Classes\Proximity;
use App\Classes\Rounds;
use App\Classes\Stats;
use App\Classes\Putting;

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
//        $scores = Stats::getScores(Auth::user()->id, $n);
        $rounds = Rounds::roundsAll(Auth::user()->id, $n);
        $roundsReversed = $rounds->reverse();

        return View::make('igif.player.stats.index')
            ->with([
                'dates' => $roundsReversed->pluck('round_date'),
                'scores' => $roundsReversed->pluck('total_score')
            ]);
    }

    public function scoring() {

        $n = 20;
//        $scores = Stats::getScores(Auth::user()->id, 20);
        $rounds = Rounds::roundsAll(Auth::user()->id, $n);

        $roundsReversed = $rounds->reverse();

        $cumulativeData = Stats::getCumulativeData(Auth::user()->id);

        return View::make('igif.player.stats.scoring')
            ->with(compact('cumulativeData'))
            ->with([
                'dates' => $roundsReversed->pluck('round_date'),
                'scores' => $roundsReversed->pluck('total_score')
            ]);

    }

    public function fairways() {

        $fw_hit = Stats::fw_hit(10);

        $dates_data = array_pluck($fw_hit, 'round_date');
        $fw_hit_data = array_pluck($fw_hit, 'fw_hit');
        $new_dates_data = array_map(array($this, 'date_adj'), $dates_data);

//        dd($dates_data);

        $n = 20;
//        $scores = Stats::getScores(Auth::user()->id, 20);
        $rounds = Rounds::roundsAll(Auth::user()->id, $n);
        $roundsReversed = $rounds->reverse();

//        dd($roundsReversed);

        return View::make('igif.player.stats.fairways')
            ->with([
                'dates' => $new_dates_data,
                'fw_hit' => $fw_hit_data,
                'scores' => $roundsReversed->pluck('total_score')
            ]);
    }

    public function gir() {

        $gir = Stats::gir(10);
        $gir_dates = array_pluck($gir, 'round_date');
        $gir_data = array_pluck($gir, 'gir');
        $new_gir_dates = array_map(array($this, 'date_adj'), $gir_dates);

        $cumulative_data = Stats::getCumulativeData(Auth::user()->id);

//        dd($cumulative_data);

        $total_gir = $cumulative_data['total_gir'];

        $total_gir_hit = $cumulative_data['total_gir_hit'];
        $total_gir_missed = $total_gir - $total_gir_hit;

        $n = 20;
        $scoresData = Scores::orderBy('round_date','desc')->take($n)->get();
        $scoresDataReversed = $scoresData->reverse();

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
        $user = Auth::user()->id;
        $rounds = Rounds::roundsAll($user, null);

        $cumputtingstats = Putting::getCululativePuttingStats($rounds);

//        dd($cumputtingstats);

        $n = 10;
        $putting = Stats::putting($n);

        $putting_dates = array_pluck($putting, 'round_date');
        $new_putting_dates = array_map(array($this, 'date_adj'), $putting_dates);

        $putting_data = array_pluck($putting, 'putts');

//dd($putting_data);

        $total_putting_data = Stats::getCumulativeData(Auth::user()->id);

        $total_putts = $total_putting_data['total_putts'];
        $total_putts_round = $total_putting_data['total_putts_round'];
        $total_putts_hole = $total_putting_data['total_putts_hole'];
        $total_putts_gir = $total_putting_data['total_putts_gir'];
        $total_threeputts = $total_putting_data['total_threeputts'];
        $total_threeputts_round = $total_putting_data['total_threeputts_round'];

        $total_zeroputts = $total_putting_data['total_zeroputts'];
        $total_oneputts = $total_putting_data['total_oneputts'];
        $total_twoputts = $total_putting_data['total_twoputts'];


        return View::make('igif.player.stats.putting')
            ->with([
                'putting_dates' => $new_putting_dates,
                'putting_data' => $putting_data,
                'zeroputts' => $total_zeroputts,
                'oneputts' => $total_oneputts,
                'twoputts' => $total_twoputts,
                'threeputts' => $total_threeputts,
                'total_putts_round' => $total_putts_round,
                'cumputtingstats' => $cumputtingstats

            ]);

    }

    public function proximity() {

        $user = Auth::user()->id;
        $rounds = Rounds::roundsAll($user, null);
        $cumulativeproximitystats = Proximity::getCumulativeProximityStats($rounds);

//      dd($cumulativeproximitystats);

        return View::make('igif.player.stats.proximity')
            ->with([
                'proximity_totals' => $cumulativeproximitystats
            ]);
    }

    private function date_adj($dates_data){
        return(Carbon::parse($dates_data)->format('m/d/Y'). " ");
    }



}
