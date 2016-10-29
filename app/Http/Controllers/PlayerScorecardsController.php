<?php

namespace App\Http\Controllers;

use App\Scores;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PlayerScorecardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $rounds = Scores::where('user_id', '=', $user)
            ->orderBy('round_date', 'desc')
            ->get();

        if ( !empty ( $request->scorecard ) ) {
            $round_id = $request->input('scorecard');
        }
        else {
            $round_id = $rounds->first()->id;

        }
//        dd($round_id);
        $score = Scores::with('scorecard.course')->find($round_id);

//        dd($score->round_type);

            $holeresults = $this->getHoleResults($score);
            $roundstats = $this->getRoundStats($score);
            $cumulativeData = $this->getCumulativeData($rounds);
            //flash the selected id
            Session::flash('scorecard_id', $round_id);

            return view('igif.player.scorecards.index', compact('score', 'rounds', 'holeresults', 'roundstats', 'cumulativeData'));
        }

    public function getHoleResults($score) {
        $holeresults_array = [];
        $parcount = 0;
        $birdiecount = 0;
        $eaglecount = 0;
        $dbleaglecount = 0;
        $bogeycount = 0;
        $dblbogeycount = 0;
        $tripleplusbogeycount = 0;

        //get the number of holes in the round is it 18 or 9


        for($i = 1;$i<19;$i++) {
            $holepar = 'hole'.$i.'_par';
            $holescore = 'hole'.$i.'_score';

            if($score->$holescore == $score->scorecard->$holepar) {
                $parcount = $parcount + 1;
            }
            if(($score->$holescore - $score->scorecard->$holepar) == -1) {
                $birdiecount = $birdiecount + 1;
            }
            if(($score->$holescore - $score->scorecard->$holepar) == -2) {
                $eaglecount = $eaglecount + 1;
            }
            if(($score->$holescore - $score->scorecard->$holepar) == -3) {
                $dbleaglecount = $dbleaglecount + 1;
            }
            if(($score->$holescore - $score->scorecard->$holepar) == -3) {
                $dbleaglecount = $dbleaglecount + 1;
            }
            if(($score->$holescore - $score->scorecard->$holepar) == 1) {
                $bogeycount = $bogeycount + 1;
            }
            if(($score->$holescore - $score->scorecard->$holepar) == 2) {
                $dblbogeycount = $dblbogeycount + 1;
            }
            if(($score->$holescore - $score->scorecard->$holepar) >= 3) {
                $tripleplusbogeycount = $tripleplusbogeycount + 1;
            }
        }

        $holeresults_array = array_add($holeresults_array, 'pars', $parcount);
        $holeresults_array = array_add($holeresults_array, 'birdies', $birdiecount);
        $holeresults_array = array_add($holeresults_array, 'eagles', $eaglecount);
        $holeresults_array = array_add($holeresults_array, 'dbleagles', $dbleaglecount);
        $holeresults_array = array_add($holeresults_array, 'bogeys', $bogeycount);
        $holeresults_array = array_add($holeresults_array, 'dblbogeys', $dblbogeycount);
        $holeresults_array = array_add($holeresults_array, 'tripleplusbogeys', $tripleplusbogeycount);

        return $holeresults_array;
    }

    public function getRoundStats($score) {

        $roundstats_array = [];
        $fwhitcount = 0;
        $gircount = 0;
        $puttscount = 0;
        $drivingholescount = 0;
        $sandsavescount = 0;
        $fwpercentage = 0;
        $girpercentage = 0;
        $puttsperhole = 0;
        $puttspergir = 0;


        for($i = 1;$i<19;$i++) {
            $holefw = 'hole' . $i . '_fw_hit';
            $holegir = 'hole' . $i . '_gir';
            $holepar = 'hole'.$i.'_par';
            $holesand = 'hole'.$i.'_sand';
            $holeputts = 'hole'.$i.'_number_of_putts';

            if($score->$holefw == 1 && $score->scorecard->$holepar > 3){
                ++$fwhitcount;
            }
            if($score->$holegir){
                ++$gircount;
            }
            if($score->$holeputts){
                $puttscount += $score->$holeputts;
            }
            if($score->scorecard->$holepar > 3) {
                ++$drivingholescount;
            }
            if($score->$holesand && ($score->$holeputts == 1)) {
                ++$sandsavescount;
            }
        }

        //calculate fw hit %
        $fwpercentage = $fwhitcount / $drivingholescount;
        $girpercentage = $gircount / 18;
        $puttsperhole = $puttscount / 18;
        $puttspergir = $puttscount / $gircount;

        $roundstats_array = array_add($roundstats_array, 'fairways', $fwhitcount);
        $roundstats_array = array_add($roundstats_array, 'greens', $gircount);
        $roundstats_array = array_add($roundstats_array, 'putts', $puttscount);
        $roundstats_array = array_add($roundstats_array, 'drivingholes', $drivingholescount);
        $roundstats_array = array_add($roundstats_array, 'sandsaves', $sandsavescount);
        $roundstats_array = array_add($roundstats_array, 'fwpercentage', $fwpercentage);
        $roundstats_array = array_add($roundstats_array, 'girpercentage', $girpercentage);
        $roundstats_array = array_add($roundstats_array, 'puttsperhole', $puttsperhole);
        $roundstats_array = array_add($roundstats_array, 'puttspergir', $puttspergir);

        return $roundstats_array;
    }

    public function getCumulativeData($rounds) {
        //Grab the data to produce the trending stats
        $cumulativedata_array = [];

        $fwhitcount = 0;
        $fwmissedcount = 0;
        $totalfw = 0;
        $totalfwavg = 0;

        $gircount = 0;
        $girmissedcount = 0;
        $totalgir = 0;
        $totalgiravg = 0;

        foreach($rounds as $key => $round){
            for($i = 1;$i<19;$i++) {
                $holefw = 'hole' . $i . '_fw_hit';
                $holepar = 'hole'.$i.'_par';
                $holegir = 'hole' . $i . '_gir';

                if($round->$holefw == 1 && $round->scorecard->$holepar > 3){
                    ++$fwhitcount;
                } elseif ($round->$holefw == 0 && $round->scorecard->$holepar > 3) {
                    ++$fwmissedcount;
                }

                if($round->$holegir == 1){
                    ++$gircount;
                } else {
                    ++$girmissedcount;
                }
            }

        }

        //dd($key);

        $totalfw = $fwhitcount + $fwmissedcount;
        $totalfwavg = $fwhitcount / $totalfw;

        $totalgir = $gircount + $girmissedcount;
        $totalgiravg = $gircount / $totalgir;
//        dd($totalgiravg);

        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw', $totalfw);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw_hit', $fwhitcount);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw_missed', $fwmissedcount);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw_percentage', $totalfwavg);

        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir', $totalgir);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_hit', $gircount);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_percentage', $totalgiravg);

        return $cumulativedata_array;


    }

//    public function index()
//    {
//        $user = Auth::user()->id;
//        $rounds = Scores::where('user_id', '=', $user)
//            ->orderBy('round_date', 'desc')
//            ->get();
//        return view('igif.player.scorecards.index', compact('rounds'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
