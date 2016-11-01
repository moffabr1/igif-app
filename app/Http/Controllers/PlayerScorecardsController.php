<?php

namespace App\Http\Controllers;

use App\Scores;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Classes\Stats;


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

//            $holeresults = $this->getHoleResults($score);
            $holeresults = Stats::getHoleResults($score);

            $roundstats = $this->getRoundStats($score);
//            $cumulativeData = $this->getCumulativeData($rounds);
            $cumulativeData = Stats::getCumulativeData($rounds);
            $proximityStatsRound = $this->getProximityStatsRound($score);
            $cumulativeproximitystats = $this->getCumulativeProximityStats($rounds);


            //flash the selected id
            Session::flash('scorecard_id', $round_id);

            return view('igif.player.scorecards.index', compact('score', 'rounds', 'holeresults', 'roundstats', 'cumulativeData', 'proximityStatsRound', 'cumulativeproximitystats'));
        }


    public function getRoundStats($score) {

        $roundstats_array = [];
        $fwhitcount = 0;
        $gircount = 0;
        $puttscount = 0;
        $threeputtscount = 0;
        $chipscount = 0;
        $twochipscount = 0;
        $drivingholescount = 0;
        $sandsavescount = 0;
        $fwpercentage = 0;
        $girpercentage = 0;
        $puttsperhole = 0;
        $puttspergir = 0;


        for($i = 1;$i<$score->round_type+1;$i++) {
            $holefw = 'hole' . $i . '_fw_hit';
            $holegir = 'hole' . $i . '_gir';
            $holepar = 'hole'.$i.'_par';
            $holesand = 'hole'.$i.'_sand';
            $holeputts = 'hole'.$i.'_number_of_putts';
            $holechips = 'hole'.$i.'_number_of_chips';

            if($score->$holefw == 1 && $score->scorecard->$holepar > 3){
                ++$fwhitcount;
            }
            if($score->$holegir){
                ++$gircount;
            }
            if($score->$holeputts){
                $puttscount += $score->$holeputts;
            }
            if($score->$holeputts > 2) {
                ++$threeputtscount;
            }
            if($score->$holechips){
                $chipscount += $score->$holechips;
            }
            if($score->$holechips >= 2) {
                ++$twochipscount;
            }

            if($score->scorecard->$holepar > 3) {
                ++$drivingholescount;
            }
            if($score->$holesand && ($score->$holeputts == 1)) {
                ++$sandsavescount;
            }
        }
//dd($fwhitcount);
        //calculate fw hit %
        $fwpercentage = $fwhitcount / $drivingholescount;
        $girpercentage = $gircount / $score->round_type;
        $puttsperhole = $puttscount / $score->round_type;
        $puttspergir = $puttscount / $gircount;

        $roundstats_array = array_add($roundstats_array, 'fairways', $fwhitcount);
        $roundstats_array = array_add($roundstats_array, 'greens', $gircount);
        $roundstats_array = array_add($roundstats_array, 'putts', $puttscount);
        $roundstats_array = array_add($roundstats_array, 'threeputts', $threeputtscount);
        $roundstats_array = array_add($roundstats_array, 'chips', $chipscount);
        $roundstats_array = array_add($roundstats_array, 'twochips', $twochipscount);
        $roundstats_array = array_add($roundstats_array, 'drivingholes', $drivingholescount);
        $roundstats_array = array_add($roundstats_array, 'sandsaves', $sandsavescount);
        $roundstats_array = array_add($roundstats_array, 'fwpercentage', $fwpercentage);
        $roundstats_array = array_add($roundstats_array, 'girpercentage', $girpercentage);
        $roundstats_array = array_add($roundstats_array, 'puttsperhole', $puttsperhole);
        $roundstats_array = array_add($roundstats_array, 'puttspergir', $puttspergir);

        return $roundstats_array;
    }

//    public function getCumulativeData($rounds) {
//        //Grab the data to produce the trending stats
//        $cumulativedata_array = [];
//
//        $totalrounds = 0;
//        $totalholes = 0;
//
//        $fwhitcount = 0;
//        $fwmissedcount = 0;
//        $totalfw = 0;
//        $totalfwavg = 0;
//
//        $gircount = 0;
//        $girmissedcount = 0;
//        $totalgir = 0;
//        $totalgiravg = 0;
//        $totalgir_round = 0;
//
//        $totalpars = 0;
//        $totalbirdies = 0;
//        $totaleagles = 0;
//        $totaldbleagles = 0;
//        $totalbogeys = 0;
//        $totaldblbogeys = 0;
//        $total3plusbogeys = 0;
//
//        $totalputts = 0;
//        $totalputts_round = 0;
//        $totalthreeputts = 0;
//        $totalthreeputts_round = 0;
//
//
//        $totalchips = 0;
//        $totalchips_round = 0;
//        $total_2chips = 0;
//        $total_2chips_round = 0;
//
//        $totalsand = 0;
//        $totalsandsaves = 0;
//        $totalsandsaveavg = 0;
//
//
//
//        foreach($rounds as $key => $round){
//
//            $totalrounds = $totalrounds + 1;
//
//            for($i = 1;$i<$round->round_type+1;$i++) {
//                $holefw = 'hole' . $i . '_fw_hit';
//                $holepar = 'hole'.$i.'_par';
//                $holegir = 'hole' . $i . '_gir';
//                $holescore = 'hole' . $i . '_score';
//                $holeputts = 'hole' . $i . '_number_of_putts';
//                $holechips = 'hole' . $i . '_number_of_chips';
//                $holesand = 'hole' . $i . '_sand';
//
//                $totalholes = $totalholes + 1;
//
//                $totalputts = $totalputts + $round->$holeputts;
//                $totalchips = $totalchips + $round->$holechips;
//                $totalsand = $totalsand + $round->$holesand;
//
//                if($round->$holefw == 1 && $round->scorecard->$holepar > 3){
//                    ++$fwhitcount;
//                } elseif ($round->$holefw == 0 && $round->scorecard->$holepar > 3) {
//                    ++$fwmissedcount;
//                }
//
//                if($round->$holegir == 1){
//                    ++$gircount;
//                } else {
//                    ++$girmissedcount;
//                }
//
//                if($round->$holesand == 1 && $round->$holeputts < 2) {
//                    ++$totalsandsaves;
//                }
//
//                if($round->$holescore == $round->scorecard->$holepar) {
//                    $totalpars = $totalpars + 1;
//                }
//                if(($round->$holescore - $round->scorecard->$holepar) == -1) {
//                    $totalbirdies = $totalbirdies + 1;
//                }
//                if(($round->$holescore - $round->scorecard->$holepar) == -2) {
//                    $totaleagles = $totaleagles + 1;
//                }
//                if(($round->$holescore - $round->scorecard->$holepar) == -3) {
//                    $totaldbleagles = $totaldbleagles + 1;
//                }
//                if(($round->$holescore - $round->scorecard->$holepar) == 1) {
//                    $totalbogeys = $totalbogeys + 1;
//                }
//                if(($round->$holescore - $round->scorecard->$holepar) == 2) {
//                    $totaldblbogeys = $totaldblbogeys + 1;
//                }
//                if(($round->$holescore - $round->scorecard->$holepar) >= 3) {
//                    $total3plusbogeys = $total3plusbogeys + 1;
//                }
//
//                if($round->$holeputts == 3) {
//                    ++$totalthreeputts;
//                }
//
//                if($round->$holechips == 2) {
//                    ++$total_2chips;
//                }
//
//            }
//
//        }
////dd($totalsand);
//        //dd($key);
////        dd($totalrounds);
////        dd($total3plusbogeys);
////        dd($totalputts);
////        dd($totalholes);
////        dd($total_2chips);
//
//
//        $totalfw = $fwhitcount + $fwmissedcount;
//        $totalfwavg = $fwhitcount / $totalfw;
//
//        $totalgir = $gircount + $girmissedcount;
//        $totalgiravg = $gircount / $totalgir;
//        $totalgir_round = $totalgir / $totalrounds;
////        dd($totalgiravg);
//
//        $totalpars_round = $totalpars / $totalrounds;
//        $totalbirdies_round = $totalbirdies / $totalrounds;
//        $totaleagles_round = $totaleagles / $totalrounds;
//        $totaldbleagles_round = $totaldbleagles / $totalrounds;
//        $totalbogeys_round = $totalbogeys / $totalrounds;
//        $totaldblbogeys_round = $totaldblbogeys / $totalrounds;
//        $total3plusbogeys_round = $total3plusbogeys / $totalrounds;
////        dd($totaleagles);
//
//        $totalputts_round = $totalputts / $totalrounds;
//        $totalputts_hole = $totalputts / $totalholes;
//        $totalputts_gir = $totalputts / $gircount;
//        $totalthreeputts_round = $totalthreeputts / $totalrounds;
//
//        $totalchips_round = $totalchips / $totalrounds;
//        $total_2chips_round = $total_2chips / $totalrounds;
//
//        $totalsandsaveavg = $totalsandsaves / $totalsand;
////        dd($totalsandsaveavg);
//
////        dd($totalputts_gir);
//
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_rounds', $totalrounds);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_holes', $totalholes);
//
//
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_pars', $totalpars);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_birdies', $totalbirdies);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_eagles', $totaleagles);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_dbleagles', $totaldbleagles);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_bogeys', $totalbogeys);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_dblbogeys', $totaldblbogeys);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_3plusbogeys', $total3plusbogeys);
//
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_pars_round', $totalpars_round);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_birdies_round', $totalbirdies_round);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_eagles_round', $totaleagles_round);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_dbleagles_round', $totaldbleagles_round);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_bogeys_round', $totalbogeys_round);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_dblbogeys_round', $totaldblbogeys_round);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_3plusbogeys_round', $total3plusbogeys_round);
//
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw', $totalfw);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw_hit', $fwhitcount);
////        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw_missed', $fwmissedcount);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw_percentage', $totalfwavg);
//
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir', $totalgir);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_hit', $gircount);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_percentage', $totalgiravg);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_round', $totalgir_round);
//
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_putts', $totalputts);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_putts_round', $totalputts_round);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_putts_hole', $totalputts_hole);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_putts_gir', $totalputts_gir);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_threeputts', $totalthreeputts);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_threeputts_round', $totalthreeputts_round);
//
//
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_chips', $totalchips);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_chips_round', $totalchips_round);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_two_chips', $total_2chips);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_two_chips_round', $total_2chips_round);
//
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_sand', $totalsand);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_sand_saves', $totalsandsaves);
//        $cumulativedata_array = array_add($cumulativedata_array, 'total_sand_saves_percentage', $totalsandsaveavg);
//
//
//
//        return $cumulativedata_array;
//
//
//    }

    public function getProximityStatsRound($score) {
        //Proximity to the hole stats for the round
        //
        $proximitystats_array = [];

        $approaches_from_200yds = 0;
        $prox_200yds_totalfeet = 0;
        $prox_200yds = 0;

        $approaches_175_200yds = 0;
        $prox_175_200yds_totalfeet = 0;
        $prox_175_200yds = 0;

        $approaches_150_175yds = 0;
        $prox_150_175yds_totalfeet = 0;
        $prox_150_175yds = 0;

        $approaches_130_150yds = 0;
        $prox_130_150yds_totalfeet = 0;
        $prox_130_150yds = 0;

        $approaches_120_130yds = 0;
        $prox_120_130yds_totalfeet = 0;
        $prox_120_130yds = 0;

        $approaches_110_120yds = 0;
        $prox_110_120yds_totalfeet = 0;
        $prox_110_120yds = 0;

        $approaches_100_110yds = 0;
        $prox_100_110yds_totalfeet = 0;
        $prox_100_110yds = 0;

        $approaches_90_100yds = 0;
        $prox_90_100yds_totalfeet = 0;
        $prox_90_100yds = 0;

        $approaches_inside_90yds = 0;
        $prox_inside_90yds_totalfeet = 0;
        $prox_inside_90yds = 0;


        for($i = 1;$i<$score->round_type+1;$i++) {

//            $holefw = 'hole' . $i . '_fw_hit';
//            $holegir = 'hole' . $i . '_gir';
            $holesand = 'hole' . $i . '_sand';
            $holechips = 'hole' . $i . '_number_of_chips';
            $holedistancetogreen = 'hole' . $i . '_distance_to_green';
            $holefirstputtdistance = 'hole' . $i . '_1st_putt_distance';

            if($score->$holedistancetogreen >= 200){
                //distance to green greater than 200
                ++$approaches_from_200yds;
                if($holechips == 0 && $holesand == 0) {
                    $prox_200yds_totalfeet = $prox_200yds_totalfeet + $score->$holefirstputtdistance;
                }
            }
            if($score->$holedistancetogreen >= 175 && $score->$holedistancetogreen < 200){
                //distance to green between 175 and 200 yards
                ++$approaches_175_200yds;
                if($holechips == 0 && $holesand == 0) {
                    $prox_175_200yds_totalfeet = $prox_175_200yds_totalfeet + $score->$holefirstputtdistance;
                }
            }
            if($score->$holedistancetogreen >= 150 && $score->$holedistancetogreen < 175){
                //distance to green between 150 and 175 yards
                ++$approaches_150_175yds;;
                if($holechips == 0 && $holesand == 0) {
                    $prox_150_175yds_totalfeet = $prox_150_175yds_totalfeet + $score->$holefirstputtdistance;
                }
            }
            if($score->$holedistancetogreen >= 130 && $score->$holedistancetogreen < 150){
                //distance to green between 130 and 150 yards
                ++$approaches_130_150yds;
                if($holechips == 0 && $holesand == 0) {
                    $prox_130_150yds_totalfeet = $prox_130_150yds_totalfeet + $score->$holefirstputtdistance;
                }
            }
            if($score->$holedistancetogreen >= 120 && $score->$holedistancetogreen < 130){
                //distance to green between 120 and 130 yards
                ++$approaches_120_130yds;
                if($holechips == 0 && $holesand == 0) {
                    $prox_120_130yds_totalfeet = $prox_120_130yds_totalfeet + $score->$holefirstputtdistance;
                }
            }
            if($score->$holedistancetogreen >= 110 && $score->$holedistancetogreen < 120){
                //distance to green between 110 and 120 yards
                ++$approaches_110_120yds;
                if($holechips == 0 && $holesand == 0) {
                    $prox_110_120yds_totalfeet = $prox_110_120yds_totalfeet + $score->$holefirstputtdistance;
                }
            }
            if($score->$holedistancetogreen >= 100 && $score->$holedistancetogreen < 110){
                //distance to green between 100 and 110 yards
                ++$approaches_100_110yds;
                if($holechips == 0 && $holesand == 0) {
                    $prox_100_110yds_totalfeet = $prox_100_110yds_totalfeet + $score->$holefirstputtdistance;
                }
            }
            if($score->$holedistancetogreen >= 90 && $score->$holedistancetogreen < 100){
                //distance to green between 100 and 110 yards
                ++$approaches_90_100yds;
                if($holechips == 0 && $holesand == 0) {
                    $prox_90_100yds_totalfeet = $prox_90_100yds_totalfeet + $score->$holefirstputtdistance;
                }
            }
            if($score->$holedistancetogreen > 0 && $score->$holedistancetogreen < 90){
                //distance to green between 0 and 90 yards
                ++$approaches_inside_90yds;
                if($holechips == 0 && $holesand == 0) {
                    $prox_inside_90yds_totalfeet = $prox_inside_90yds_totalfeet + $score->$holefirstputtdistance;
                }
            }


        }

//dd($prox_inside_90yds_totalfeet);
//        dd($prox_90_100yds_totalfeet);

        if($prox_200yds_totalfeet != 0) {
            $prox_200yds = $prox_200yds_totalfeet / $approaches_from_200yds;
        } else {
            $prox_200yds = 'No Data';
        }
        if ($prox_175_200yds_totalfeet != 0) {
            $prox_175_200yds = $prox_175_200yds_totalfeet / $approaches_175_200yds;
        } else {
            $prox_175_200yds = 'No Data';
        }
        if($prox_150_175yds_totalfeet != 0){
            $prox_150_175yds = $prox_150_175yds_totalfeet / $approaches_150_175yds;
        } else {
            $prox_150_175yds = 'No Data';
        }
        if($prox_130_150yds_totalfeet != 0) {
            $prox_130_150yds = $prox_130_150yds_totalfeet / $approaches_130_150yds;
        } else {
            $prox_130_150yds = 'No Data';
        }
        if($prox_120_130yds_totalfeet != 0) {
            $prox_120_130yds = $prox_120_130yds_totalfeet / $approaches_120_130yds;
        } else {
            $prox_120_130yds = 'No Data';
        }
        if($prox_110_120yds_totalfeet != 0){
            $prox_110_120yds = $prox_110_120yds_totalfeet / $approaches_110_120yds;
        } else {
            $prox_110_120yds = 'No Data';
        }
        if($prox_100_110yds_totalfeet != 0) {
            $prox_100_110yds = $prox_100_110yds_totalfeet / $approaches_100_110yds;
        } else {
            $prox_100_110yds = 'No Data';
        }
        if($prox_90_100yds_totalfeet != 0){
            $prox_90_100yds = $prox_90_100yds_totalfeet / $approaches_90_100yds;
        } else {
            $prox_90_100yds = 'No Data';
        }
        if($prox_inside_90yds_totalfeet != 0) {
            $prox_inside_90yds = $prox_inside_90yds_totalfeet / $approaches_inside_90yds;
        } else {
            $prox_inside_90yds = 'No Data';
        }


        $proximitystats_array = array_add($proximitystats_array, 'prox_200yds', $prox_200yds);
        $proximitystats_array = array_add($proximitystats_array, 'prox_175_200yds', $prox_175_200yds);
        $proximitystats_array = array_add($proximitystats_array, 'prox_150_175yds', $prox_150_175yds);
        $proximitystats_array = array_add($proximitystats_array, 'prox_130_150yds', $prox_130_150yds);
        $proximitystats_array = array_add($proximitystats_array, 'prox_120_130yds', $prox_120_130yds);
        $proximitystats_array = array_add($proximitystats_array, 'prox_110_120yds', $prox_110_120yds);
        $proximitystats_array = array_add($proximitystats_array, 'prox_100_110yds', $prox_100_110yds);
        $proximitystats_array = array_add($proximitystats_array, 'prox_90_100yds', $prox_90_100yds);
        $proximitystats_array = array_add($proximitystats_array, 'prox_inside_90yds', $prox_inside_90yds);

        return $proximitystats_array;
    }

    public function getCumulativeProximityStats($rounds) {

        $cumulativeproximitystats_array = [];
        $totalrounds = 0;

        $approaches_from_200yds = 0;
        $prox_200yds_totalfeet = 0;
        $prox_200yds = 0;

        $approaches_175_200yds = 0;
        $prox_175_200yds_totalfeet = 0;
        $prox_175_200yds = 0;

        $approaches_150_175yds = 0;
        $prox_150_175yds_totalfeet = 0;
        $prox_150_175yds = 0;

        $approaches_130_150yds = 0;
        $prox_130_150yds_totalfeet = 0;
        $prox_130_150yds = 0;

        $approaches_120_130yds = 0;
        $prox_120_130yds_totalfeet = 0;
        $prox_120_130yds = 0;

        $approaches_110_120yds = 0;
        $prox_110_120yds_totalfeet = 0;
        $prox_110_120yds = 0;

        $approaches_100_110yds = 0;
        $prox_100_110yds_totalfeet = 0;
        $prox_100_110yds = 0;

        $approaches_90_100yds = 0;
        $prox_90_100yds_totalfeet = 0;
        $prox_90_100yds = 0;

        $approaches_inside_90yds = 0;
        $prox_inside_90yds_totalfeet = 0;
        $prox_inside_90yds = 0;

        foreach($rounds as $key => $round) {

            $totalrounds = $totalrounds + 1;

            for ($i = 1; $i < $round->round_type + 1; $i++) {
                $holesand = 'hole' . $i . '_sand';
                $holechips = 'hole' . $i . '_number_of_chips';
                $holedistancetogreen = 'hole' . $i . '_distance_to_green';
                $holefirstputtdistance = 'hole' . $i . '_1st_putt_distance';

                if($round->$holedistancetogreen >= 200){
                    //distance to green greater than 200
                    ++$approaches_from_200yds;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_200yds_totalfeet = $prox_200yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 175 && $round->$holedistancetogreen < 200){
                    //distance to green between 175 and 200 yards
                    ++$approaches_175_200yds;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_175_200yds_totalfeet = $prox_175_200yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 150 && $round->$holedistancetogreen < 175){
                    //distance to green between 150 and 175 yards
                    ++$approaches_150_175yds;;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_150_175yds_totalfeet = $prox_150_175yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 130 && $round->$holedistancetogreen < 150){
                    //distance to green between 130 and 150 yards
                    ++$approaches_130_150yds;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_130_150yds_totalfeet = $prox_130_150yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 120 && $round->$holedistancetogreen < 130){
                    //distance to green between 120 and 130 yards
                    ++$approaches_120_130yds;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_120_130yds_totalfeet = $prox_120_130yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 110 && $round->$holedistancetogreen < 120){
                    //distance to green between 110 and 120 yards
                    ++$approaches_110_120yds;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_110_120yds_totalfeet = $prox_110_120yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 100 && $round->$holedistancetogreen < 110){
                    //distance to green between 100 and 110 yards
                    ++$approaches_100_110yds;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_100_110yds_totalfeet = $prox_100_110yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 90 && $round->$holedistancetogreen < 100){
                    //distance to green between 100 and 110 yards
                    ++$approaches_90_100yds;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_90_100yds_totalfeet = $prox_90_100yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen > 0 && $round->$holedistancetogreen < 90){
                    //distance to green between 0 and 90 yards
                    ++$approaches_inside_90yds;
                    if($holechips == 0 && $holesand == 0) {
                        $prox_inside_90yds_totalfeet = $prox_inside_90yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }

            }
        }

//        dd($totalrounds);

        if($prox_200yds_totalfeet != 0) {
            $prox_200yds = $prox_200yds_totalfeet / $approaches_from_200yds;
        } else {
            $prox_200yds = 'No Data';
        }
        if ($prox_175_200yds_totalfeet != 0) {
            $prox_175_200yds = $prox_175_200yds_totalfeet / $approaches_175_200yds;
        } else {
            $prox_175_200yds = 'No Data';
        }
        if($prox_150_175yds_totalfeet != 0){
            $prox_150_175yds = $prox_150_175yds_totalfeet / $approaches_150_175yds;
        } else {
            $prox_150_175yds = 'No Data';
        }
        if($prox_130_150yds_totalfeet != 0) {
            $prox_130_150yds = $prox_130_150yds_totalfeet / $approaches_130_150yds;
        } else {
            $prox_130_150yds = 'No Data';
        }
        if($prox_120_130yds_totalfeet != 0) {
            $prox_120_130yds = $prox_120_130yds_totalfeet / $approaches_120_130yds;
        } else {
            $prox_120_130yds = 'No Data';
        }
        if($prox_110_120yds_totalfeet != 0){
            $prox_110_120yds = $prox_110_120yds_totalfeet / $approaches_110_120yds;
        } else {
            $prox_110_120yds = 'No Data';
        }
        if($prox_100_110yds_totalfeet != 0) {
            $prox_100_110yds = $prox_100_110yds_totalfeet / $approaches_100_110yds;
        } else {
            $prox_100_110yds = 'No Data';
        }
        if($prox_90_100yds_totalfeet != 0){
            $prox_90_100yds = $prox_90_100yds_totalfeet / $approaches_90_100yds;
        } else {
            $prox_90_100yds = 'No Data';
        }
        if($prox_inside_90yds_totalfeet != 0) {
            $prox_inside_90yds = $prox_inside_90yds_totalfeet / $approaches_inside_90yds;
        } else {
            $prox_inside_90yds = 'No Data';
        }


//        dd($prox_200yds);

        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_200yds', $prox_200yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_200yds', $prox_200yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_175_200yds', $prox_175_200yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_150_175yds', $prox_150_175yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_130_150yds', $prox_130_150yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_120_130yds', $prox_120_130yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_110_120yds', $prox_110_120yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_100_110yds', $prox_100_110yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_90_100yds', $prox_90_100yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_inside_90yds', $prox_inside_90yds);

        return $cumulativeproximitystats_array;
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

    //    public function getHoleResults($score) {
//        $holeresults_array = [];
//        $parcount = 0;
//        $birdiecount = 0;
//        $eaglecount = 0;
//        $dbleaglecount = 0;
//        $bogeycount = 0;
//        $dblbogeycount = 0;
//        $tripleplusbogeycount = 0;
//
//        //get the number of holes in the round is it 18 or 9
//
//
//        for($i = 1;$i<$score->round_type+1 ;$i++) {
//            $holepar = 'hole'.$i.'_par';
//            $holescore = 'hole'.$i.'_score';
//
//            if($score->$holescore == $score->scorecard->$holepar) {
//                $parcount = $parcount + 1;
//            }
//            if(($score->$holescore - $score->scorecard->$holepar) == -1) {
//                $birdiecount = $birdiecount + 1;
//            }
//            if(($score->$holescore - $score->scorecard->$holepar) == -2) {
//                $eaglecount = $eaglecount + 1;
//            }
//            if(($score->$holescore - $score->scorecard->$holepar) == -3) {
//                $dbleaglecount = $dbleaglecount + 1;
//            }
//            if(($score->$holescore - $score->scorecard->$holepar) == -3) {
//                $dbleaglecount = $dbleaglecount + 1;
//            }
//            if(($score->$holescore - $score->scorecard->$holepar) == 1) {
//                $bogeycount = $bogeycount + 1;
//            }
//            if(($score->$holescore - $score->scorecard->$holepar) == 2) {
//                $dblbogeycount = $dblbogeycount + 1;
//            }
//            if(($score->$holescore - $score->scorecard->$holepar) >= 3) {
//                $tripleplusbogeycount = $tripleplusbogeycount + 1;
//            }
//        }
//
//        $holeresults_array = array_add($holeresults_array, 'pars', $parcount);
//        $holeresults_array = array_add($holeresults_array, 'birdies', $birdiecount);
//        $holeresults_array = array_add($holeresults_array, 'eagles', $eaglecount);
//        $holeresults_array = array_add($holeresults_array, 'dbleagles', $dbleaglecount);
//        $holeresults_array = array_add($holeresults_array, 'bogeys', $bogeycount);
//        $holeresults_array = array_add($holeresults_array, 'dblbogeys', $dblbogeycount);
//        $holeresults_array = array_add($holeresults_array, 'tripleplusbogeys', $tripleplusbogeycount);
//
//        return $holeresults_array;
//    }


}
