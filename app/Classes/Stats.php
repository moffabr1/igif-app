<?php
namespace App\Classes;

use App\Scores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Stats
{
    public static function getRoundStats($round) {

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


        for($i = 1;$i<$round->round_type+1;$i++) {
            $holefw = 'hole' . $i . '_fw_hit';
            $holegir = 'hole' . $i . '_gir';
            $holepar = 'hole'.$i.'_par';
            $holesand = 'hole'.$i.'_sand';
            $holeputts = 'hole'.$i.'_number_of_putts';
            $holechips = 'hole'.$i.'_number_of_chips';

            if($round->$holefw == 1 && $round->scorecard->$holepar > 3){
                ++$fwhitcount;
            }
            if($round->$holegir){
                ++$gircount;
            }
            if($round->$holeputts){
                $puttscount += $round->$holeputts;
            }
            if($round->$holeputts > 2) {
                ++$threeputtscount;
            }
            if($round->$holechips){
                $chipscount += $round->$holechips;
            }
            if($round->$holechips >= 2) {
                ++$twochipscount;
            }

            if($round->scorecard->$holepar > 3) {
                ++$drivingholescount;
            }
            if($round->$holesand && ($round->$holeputts == 1)) {
                ++$sandsavescount;
            }
        }
//dd($fwhitcount);
        //calculate fw hit %
        $fwpercentage = $fwhitcount / $drivingholescount;
        $girpercentage = $gircount / $round->round_type;
        $puttsperhole = $puttscount / $round->round_type;
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

    public static function getHoleResults($score) {
        $holeresults_array = [];
        $parcount = 0;
        $birdiecount = 0;
        $eaglecount = 0;
        $dbleaglecount = 0;
        $bogeycount = 0;
        $dblbogeycount = 0;
        $tripleplusbogeycount = 0;

        //get the number of holes in the round is it 18 or 9

        for($i = 1;$i<$score->round_type+1 ;$i++) {
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

    public static function getCumulativeData($user) {
        //Grab the data to produce the trending stats

//        $rounds = self::getRounds($user);
        $rounds = Rounds::roundsAll($user, null);


//        dd($rounds);

        $cumulativedata_array = [];

        $totalrounds = 0;
        $totalholes = 0;

        $fwhitcount = 0;
        $fwmissedcount = 0;
        $totalfw = 0;
        $totalfwavg = 0;

        $gircount = 0;
        $girmissedcount = 0;
        $totalgir = 0;
        $totalgiravg = 0;
        $totalgir_round = 0;

        $totalpars = 0;
        $totalbirdies = 0;
        $totaleagles = 0;
        $totaldbleagles = 0;
        $totalbogeys = 0;
        $totaldblbogeys = 0;
        $total3plusbogeys = 0;

        $totalputts = 0;
        $totalputts_round = 0;
        $totalthreeputts = 0;
        $totalthreeputts_round = 0;
        $totalzeroputts = 0;
        $totaloneputts = 0;
        $totaltwoputts = 0;

        $totalchips = 0;
        $totalchips_round = 0;
        $total_2chips = 0;
        $total_2chips_round = 0;

        $totalsand = 0;
        $totalsandsaves = 0;
        $totalsandsaveavg = 0;

        foreach($rounds as $key => $round){

            $totalrounds = $totalrounds + 1;

//            dd($totalrounds);

            for($i = 1;$i<$round->round_type+1;$i++) {
                $holefw = 'hole' . $i . '_fw_hit';
                $holepar = 'hole'.$i.'_par';
                $holegir = 'hole' . $i . '_gir';
                $holescore = 'hole' . $i . '_score';
                $holeputts = 'hole' . $i . '_number_of_putts';
                $holechips = 'hole' . $i . '_number_of_chips';
                $holesand = 'hole' . $i . '_sand';

                $totalholes = $totalholes + 1;

                $totalputts = $totalputts + $round->$holeputts;
                $totalchips = $totalchips + $round->$holechips;
                $totalsand = $totalsand + $round->$holesand;


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

                if($round->$holesand == 1 && $round->$holeputts < 2) {
                    ++$totalsandsaves;
                }

                if($round->$holescore == $round->scorecard->$holepar) {
                    $totalpars = $totalpars + 1;
                }
                if(($round->$holescore - $round->scorecard->$holepar) == -1) {
                    $totalbirdies = $totalbirdies + 1;
                }
                if(($round->$holescore - $round->scorecard->$holepar) == -2) {
                    $totaleagles = $totaleagles + 1;
                }
                if(($round->$holescore - $round->scorecard->$holepar) == -3) {
                    $totaldbleagles = $totaldbleagles + 1;
                }
                if(($round->$holescore - $round->scorecard->$holepar) == 1) {
                    $totalbogeys = $totalbogeys + 1;
                }
                if(($round->$holescore - $round->scorecard->$holepar) == 2) {
                    $totaldblbogeys = $totaldblbogeys + 1;
                }
                if(($round->$holescore - $round->scorecard->$holepar) >= 3) {
                    $total3plusbogeys = $total3plusbogeys + 1;
                }

                if($round->$holeputts == 3) {
                    ++$totalthreeputts;
                } elseif($round->$holeputts == 2) {
                    ++$totaltwoputts;
                } elseif($round->$holeputts == 1) {
                    ++$totaloneputts;
                } elseif($round->$holeputts == 0) {
                    ++$totalzeroputts;
                }

                if($round->$holechips == 2) {
                    ++$total_2chips;
                }

            }

        }
        $totalfw = $fwhitcount + $fwmissedcount;
        $totalfwavg = $fwhitcount / $totalfw;
        $totalgir = $gircount + $girmissedcount;
        $totalgiravg = $gircount / $totalgir;
        $totalgir_round = $gircount / $totalrounds;
//        dd($totalgir_round);
        $totalpars_round = $totalpars / $totalrounds;
        $totalbirdies_round = $totalbirdies / $totalrounds;
        $totaleagles_round = $totaleagles / $totalrounds;
        $totaldbleagles_round = $totaldbleagles / $totalrounds;
        $totalbogeys_round = $totalbogeys / $totalrounds;
        $totaldblbogeys_round = $totaldblbogeys / $totalrounds;
        $total3plusbogeys_round = $total3plusbogeys / $totalrounds;
        $totalputts_round = $totalputts / $totalrounds;
        $totalputts_hole = $totalputts / $totalholes;
        $totalputts_gir = $totalputts / $gircount;
        $totalthreeputts_round = $totalthreeputts / $totalrounds;
        $totalchips_round = $totalchips / $totalrounds;
        $total_2chips_round = $total_2chips / $totalrounds;
        $totalsandsaveavg = $totalsandsaves / $totalsand;

        $total_gir_percentage_formatted = number_format($totalgiravg, 2) * 100 . ' %';

        $cumulativedata_array = array_add($cumulativedata_array, 'total_rounds', $totalrounds);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_holes', $totalholes);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_pars', $totalpars);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_birdies', $totalbirdies);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_eagles', $totaleagles);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_dbleagles', $totaldbleagles);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_bogeys', $totalbogeys);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_dblbogeys', $totaldblbogeys);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_3plusbogeys', $total3plusbogeys);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_pars_round', $totalpars_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_birdies_round', $totalbirdies_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_eagles_round', $totaleagles_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_dbleagles_round', $totaldbleagles_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_bogeys_round', $totalbogeys_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_dblbogeys_round', $totaldblbogeys_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_3plusbogeys_round', $total3plusbogeys_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw', $totalfw);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw_hit', $fwhitcount);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_fw_percentage', $totalfwavg);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir', $totalgir);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_hit', $gircount);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_percentage', $totalgiravg);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_percentage_formatted', $total_gir_percentage_formatted);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_gir_round', $totalgir_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_putts', $totalputts);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_putts_round', $totalputts_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_putts_hole', $totalputts_hole);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_putts_gir', $totalputts_gir);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_threeputts', $totalthreeputts);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_threeputts_round', $totalthreeputts_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_zeroputts', $totalzeroputts);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_oneputts', $totaloneputts);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_twoputts', $totaltwoputts);

        $cumulativedata_array = array_add($cumulativedata_array, 'total_chips', $totalchips);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_chips_round', $totalchips_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_two_chips', $total_2chips);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_two_chips_round', $total_2chips_round);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_sand', $totalsand);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_sand_saves', $totalsandsaves);
        $cumulativedata_array = array_add($cumulativedata_array, 'total_sand_saves_percentage', $totalsandsaveavg);

        return $cumulativedata_array;


    }

    public static function fw_hit($n) {

        $fw_hit = DB::table('scores')
            ->select('round_date', 'round_type', 'scorecard_id', 'user_id',
                DB::raw('sum(hole1_fw_hit + 
                                hole2_fw_hit + 
                                hole4_fw_hit + 
                                hole5_fw_hit + 
                                hole6_fw_hit + 
                                hole7_fw_hit + 
                                hole8_fw_hit + 
                                hole9_fw_hit + 
                                hole10_fw_hit + 
                                hole11_fw_hit + 
                                hole12_fw_hit + 
                                hole13_fw_hit + 
                                hole14_fw_hit + 
                                hole15_fw_hit + 
                                hole16_fw_hit + 
                                hole17_fw_hit + 
                                hole18_fw_hit) as fw_hit'))
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('round_date')
            ->orderBy('round_date','desc')
            ->take($n)
            ->get();

//        dd($fw_hit);

//        $fw_hit_reversed = $fw_hit->reverse();
        $fw_hit_reversed = array_reverse($fw_hit, false);

//        dd($fw_hit_reversed);

//        return($fw_hit);
        return($fw_hit_reversed);

    }

    public static function gir($n) {

        $gir = DB::table('scores')
            ->select('round_date', 'round_type', 'scorecard_id', 'user_id',
                DB::raw('sum(hole1_gir + 
                                hole2_gir + 
                                hole4_gir + 
                                hole5_gir + 
                                hole6_gir + 
                                hole7_gir + 
                                hole8_gir + 
                                hole9_gir + 
                                hole10_gir + 
                                hole11_gir + 
                                hole12_gir + 
                                hole13_gir + 
                                hole14_gir + 
                                hole15_gir + 
                                hole16_gir + 
                                hole17_gir + 
                                hole18_gir) as gir'))
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('round_date')
            ->orderBy('round_date','desc')
            ->take($n)
            ->get();

//        $fw_hit_reversed = $fw_hit->reverse();
        $gir_reversed = array_reverse($gir, false);

//        dd($fw_hit_reversed);

//        return($fw_hit);
        return($gir_reversed);

    }

    public static function putting($n) {

//        $rounds = Stats::getUserRounds(Auth::user()->id);

        $putting_stats = DB::table('scores')
            ->select('round_date', 'round_type', 'scorecard_id', 'user_id',
                DB::raw('sum(hole1_number_of_putts + 
                                hole2_number_of_putts + 
                                hole4_number_of_putts + 
                                hole5_number_of_putts + 
                                hole6_number_of_putts + 
                                hole7_number_of_putts + 
                                hole8_number_of_putts + 
                                hole9_number_of_putts + 
                                hole10_number_of_putts + 
                                hole11_number_of_putts + 
                                hole12_number_of_putts + 
                                hole13_number_of_putts + 
                                hole14_number_of_putts + 
                                hole15_number_of_putts + 
                                hole16_number_of_putts + 
                                hole17_number_of_putts + 
                                hole18_number_of_putts) as putts'))
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('round_date')
            ->orderBy('round_date','desc')
            ->take($n)
            ->get();

        $putting_stats_reversed = array_reverse($putting_stats, false);

        return $putting_stats_reversed;


    }


}