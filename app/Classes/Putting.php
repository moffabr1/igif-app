<?php
/**
 * Created by PhpStorm.
 * User: brianmof
 * Date: 11/3/16
 * Time: 6:58 PM
 */

namespace App\Classes;


use App\Scores;
use Illuminate\Support\Facades\Auth;

class Putting
{

    public static function getCululativePuttingStats($rounds)
    {
        $putting_stats_array = [];

        $totalrounds = 0;
        $totalholes = 0;
        $totalputts = 0;
        $totalgir = 0;

        $totalsecondputts = 0;
        $totalsecondputtdistance = 0;
        $totalapproachputtperformance = 0;

        $oneputtpercentage = 0;
        $twoeputtpercentage = 0;
        $threeputtpercentage = 0;

        //2 putts with first putt over 25 feet
        $twoputtsovertwentyfivefeet = 0;
        $lagputtingefficiency = 0;

        //total 3 putts / total holes
        $threeputtavoidance = 0;

        $birdieorbetterconversion = 0;
        $parorbetterconversion = 0;
        $birdieorbetterconversionpercentage = 0;
        $parorbetterconversionpercentage = 0;


        $totalthreeputts = 0;
        $totaltwoputts = 0;
        $totaloneputts = 0;
        $totalzeroputts = 0;

        $totalputts_round = 0;
        $totalputts_hole = 0;

        $avgfirstputtdistance = 0;
        $avgsecondputtdistance = 0;

        $avglagputtingdistance = 0;

        $makepercentfrom3feet = 0;
        $makepercentfrom4feet = 0;
        $makepercentfrom5feet = 0;
        $makepercentfrom6feet = 0;
        $makepercentfrom7feet = 0;
        $makepercentfrom8feet = 0;
        $makepercentfrom9feet = 0;
        $makepercentfrom10feet = 0;

        $makepercentfourtoeightfeet = 0;
        $makepercentinsidetenfeet = 0;
        $makepercenttentofifteenfeet = 0;
        $makepercentfifteentotwentyfeet = 0;
        $makepercenttwentytotwentyfivefeet = 0;
        $makepercentovertwentyfeet = 0;

        $puttthreefooter_total = 0;
        $puttthreefooter_make = 0;
        $puttthreefooter_miss = 0;

        $puttfourfooter_total = 0;
        $puttfourfooter_make = 0;
        $puttfourfooter_miss = 0;

        $puttfivefooter_total = 0;
        $puttfivefooter_make = 0;
        $puttfivefooter_miss = 0;

        $puttsixfooter_total = 0;
        $puttsixfooter_make = 0;
        $puttsixfooter_miss = 0;

        $puttsevenfooter_total = 0;
        $puttsevenfooter_make = 0;
        $puttsevenfooter_miss = 0;

        $putteightfooter_total = 0;
        $putteightfooter_make = 0;
        $putteightfooter_miss = 0;

        $puttninefooter_total = 0;
        $puttninefooter_make = 0;
        $puttninefooter_miss = 0;

        $putttenfooter_total = 0;
        $putttenfooter_make = 0;
        $putttenfooter_miss = 0;

        $putttentofifteenfooter_total = 0;
        $putttentofifteenfooter_make = 0;

        $puttfifteentotwentyfooter_total = 0;
        $puttfifteentotwentyfooter_make = 0;

        $putttwentytotwentyfivefooter_total = 0;
        $putttwentytotwentyfivefooter_make = 0;

        $putttovertwentyfivefooter_total = 0;
        $putttovertwentyfivefooter_make = 0;

        $longestputtfeet = 0;

        foreach($rounds as $key => $round) {

            $totalrounds = $totalrounds + 1;

            for ($i = 1; $i < $round->round_type + 1; $i++) {

                $holepar = 'hole'.$i.'_par';
                $holegir = 'hole' . $i . '_gir';
                $holescore = 'hole' . $i . '_score';

                $holefirstputtdistance = 'hole' . $i . '_1st_putt_distance';
                $holesecondputtdistance = 'hole' . $i . '_2nd_putt_distance';
                $holeputts = 'hole' . $i . '_number_of_putts';


                $totalholes = $totalholes + 1;
                $totalputts = $totalputts + $round->$holeputts;

                if($round->$holeputts == 3) {
                    ++$totalthreeputts;
                } elseif($round->$holeputts == 2) {
                    ++$totaltwoputts;
                } elseif($round->$holeputts == 1) {
                    ++$totaloneputts;
                } elseif($round->$holeputts == 0) {
                    ++$totalzeroputts;
                }

                if($round->$holeputts <= 2 && $round->$holefirstputtdistance >=25) {
                    ++$twoputtsovertwentyfivefeet;
                }

                if($round->$holeputts == 2){
                    ++$totalsecondputts;
                    $totalsecondputtdistance = $totalsecondputtdistance + $round->$holesecondputtdistance;
                }

                if($round->$holegir == 1) {
                    ++$totalgir;
                    if(($round->$holescore - $round->scorecard->$holepar) <= -1){
                        ++$birdieorbetterconversion;
                    }
                    elseif(($round->$holescore - $round->scorecard->$holepar) <= 0){
                        ++$parorbetterconversion;
                    }
                }

                if($round->$holefirstputtdistance > $longestputtfeet && $round->$holesecondputtdistance == 0.0 ){
                    $longestputtfeet = $round->$holefirstputtdistance;
                }

                if($round->$holefirstputtdistance <= 3.0) {
                    ++$puttthreefooter_total;
                    if ($round->$holefirstputtdistance <= 3.0 && $round->$holesecondputtdistance == 0.0) {
                        ++$puttthreefooter_make;
                    }
                }
                if($round->$holefirstputtdistance > 3.0 && $round->$holefirstputtdistance <= 4.0) {
                    ++$puttfourfooter_total;
                    if (($round->$holefirstputtdistance > 3.0 && $round->$holefirstputtdistance <= 4.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$puttfourfooter_make;
                    }
                }
                if($round->$holefirstputtdistance > 4.0 && $round->$holefirstputtdistance <= 5.0) {
                    ++$puttfivefooter_total;
                    if (($round->$holefirstputtdistance > 4.0 && $round->$holefirstputtdistance <= 5.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$puttfivefooter_make;
                    }
                }
                if($round->$holefirstputtdistance > 5.0 && $round->$holefirstputtdistance <= 6.0) {
                    ++$puttsixfooter_total;
                    if (($round->$holefirstputtdistance > 5.0 && $round->$holefirstputtdistance <= 6.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$puttsixfooter_make;
                    }
                }
                if($round->$holefirstputtdistance > 6.0 && $round->$holefirstputtdistance <= 7.0) {
                    ++$puttsevenfooter_total;
                    if (($round->$holefirstputtdistance > 6.0 && $round->$holefirstputtdistance <= 7.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$puttsevenfooter_make;
                    }
                }
                if($round->$holefirstputtdistance > 7.0 && $round->$holefirstputtdistance <= 8.0) {
                    ++$putteightfooter_total;
                    if (($round->$holefirstputtdistance > 7.0 && $round->$holefirstputtdistance <= 8.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$putteightfooter_make;
                    }
                }
                if($round->$holefirstputtdistance > 8.0 && $round->$holefirstputtdistance <= 9.0) {
                    ++$puttninefooter_total;
                    if (($round->$holefirstputtdistance > 7.0 && $round->$holefirstputtdistance <= 8.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$puttninefooter_make;
                    }
                }
                if($round->$holefirstputtdistance > 8.0 && $round->$holefirstputtdistance <= 9.0) {
                    ++$puttninefooter_total;
                    if (($round->$holefirstputtdistance > 8.0 && $round->$holefirstputtdistance <= 9.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$puttninefooter_make;
                    }
                }
                if($round->$holefirstputtdistance > 9.0 && $round->$holefirstputtdistance <= 10.0) {
                    ++$putttenfooter_total;
                    if (($round->$holefirstputtdistance > 9.0 && $round->$holefirstputtdistance <= 10.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$putttenfooter_make;
                    }
                }
                if($round->$holefirstputtdistance >= 10.0 && $round->$holefirstputtdistance <= 15.0) {
                    ++$putttentofifteenfooter_total;
                    if (($round->$holefirstputtdistance >= 10.0 && $round->$holefirstputtdistance <= 15.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$putttentofifteenfooter_make;
                    }
                }
                if($round->$holefirstputtdistance >= 15.0 && $round->$holefirstputtdistance <= 20.0) {
                    ++$puttfifteentotwentyfooter_total;
                    if (($round->$holefirstputtdistance >= 15.0 && $round->$holefirstputtdistance <= 20.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$puttfifteentotwentyfooter_make;
                    }
                }
                if($round->$holefirstputtdistance >= 20.0 && $round->$holefirstputtdistance <= 25.0) {
                    ++$putttwentytotwentyfivefooter_total;
                    if (($round->$holefirstputtdistance >= 20.0 && $round->$holefirstputtdistance <= 25.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$putttwentytotwentyfivefooter_make;
                    }
                }
                if($round->$holefirstputtdistance >= 25.0) {
                    ++$putttovertwentyfivefooter_total;
                    if (($round->$holefirstputtdistance >= 25.0) && ($round->$holesecondputtdistance == 0.0)) {
                        ++$putttovertwentyfivefooter_make;
                    }
                }



            }

        }

//        dd($birdieorbetterconversionpercentage);

        $oneputtpercentage = $totaloneputts / $totalputts;
        $twoputtpercentage = $totaltwoputts / $totalputts;
        $threeputtpercentage = $totalthreeputts / $totalputts;

        $lagputtingefficiency = $twoputtsovertwentyfivefeet / $putttovertwentyfivefooter_total;
        $threeputtavoidance = $totalthreeputts / $totalholes;

        $totalputts_round = $totalputts / $totalrounds;

        $totalapproachputtperformance = $totalsecondputtdistance / $totalsecondputts;

        $birdieorbetterconversionpercentage = $birdieorbetterconversion / $totalgir;
        $parorbetterconversionpercentage = $parorbetterconversion / $totalgir;



//        dd($parorbetterconversionpercentage);


        $puttthreefooter_miss = $puttthreefooter_total - $puttthreefooter_make;
        $puttfourfooter_miss = $puttfourfooter_total - $puttfourfooter_make;
        $puttfivefooter_miss = $puttfivefooter_total - $puttfivefooter_make;
        $puttsixfooter_miss = $puttsixfooter_total - $puttsixfooter_make;
        $puttsevenfooter_miss = $puttsevenfooter_total - $puttsevenfooter_make;
        $putteightfooter_miss = $putteightfooter_total - $putteightfooter_make;
        $puttninefooter_miss = $puttninefooter_total - $puttninefooter_make;
        $putttenfooter_miss = $putttenfooter_total - $putttenfooter_make;
        $putttentofifteenfooter_miss = $putttentofifteenfooter_total - $putttentofifteenfooter_make;
        $puttfifteentotwentyfooter_miss = $puttfifteentotwentyfooter_total - $puttfifteentotwentyfooter_make;
        $putttwentytotwentyfivefooter_miss = $putttwentytotwentyfivefooter_total - $putttwentytotwentyfivefooter_make;
        $putttovertwentyfivefooter_miss = $putttovertwentyfivefooter_total - $putttovertwentyfivefooter_make;

        $puttfourtoeightfeet_make = $puttfourfooter_make +
                                    $puttfivefooter_make +
                                    $puttsixfooter_make +
                                    $puttsevenfooter_make +
                                    $putteightfooter_make;

        $puttfourtoeightfeet_miss = $puttfourfooter_miss +
                                    $puttfivefooter_miss +
                                    $puttsixfooter_miss +
                                    $puttsevenfooter_miss +
                                    $putteightfooter_miss;

        $puttinsidetenfeet_make =   $puttfourfooter_make +
                                    $puttfivefooter_make +
                                    $puttsixfooter_make +
                                    $puttsevenfooter_make +
                                    $putteightfooter_make +
                                    $puttninefooter_make +
                                    $putttenfooter_make;

        $puttinsidetenfeet_miss = $puttfourfooter_miss +
                                    $puttfivefooter_miss +
                                    $puttsixfooter_miss +
                                    $puttsevenfooter_miss +
                                    $putteightfooter_miss +
                                    $puttninefooter_make +
                                    $putttenfooter_make;

        $oneputtpercentage_formatted = number_format($oneputtpercentage, 2) * 100 . '%';
        $twoputtpercentage_formatted = number_format($twoputtpercentage, 2) * 100 . '%';
        $threeputtpercentage_formatted = number_format($threeputtpercentage, 2) * 100 . '%';

        $lagputtingefficiency_formatted = number_format($lagputtingefficiency, 2) * 100 . '%';

        $birdieorbetterconversionpercentage_formatted = number_format($birdieorbetterconversionpercentage, 2) * 100 . '%';
        $parorbetterconversionpercentage_formatted = number_format($parorbetterconversionpercentage, 2) * 100 . '%';

//        dd($parorbetterconversionpercentage_formatted);

        $puttthreefooter_make_percentage = $puttthreefooter_make / $puttthreefooter_total;
        $puttthreefooter_make_percentage_formatted = number_format($puttthreefooter_make_percentage, 2) * 100 . ' %';

        $puttfourfooter_make_percentage = $puttfourfooter_make / $puttfourfooter_total;
        $puttfourfooter_make_percentage_formatted = number_format($puttfourfooter_make_percentage, 2) * 100 . ' %';

        $puttfivefooter_make_percentage = $puttfivefooter_make / $puttfivefooter_total;
        $puttfivefooter_make_percentage_formatted = number_format($puttfivefooter_make_percentage, 2) * 100 . ' %';

        $puttsixfooter_make_percentage = $puttsixfooter_make / $puttsixfooter_total;
        $puttsixfooter_make_percentage_formatted = number_format($puttsixfooter_make_percentage, 2) * 100 . ' %';

        $puttsevenfooter_make_percentage = $puttsevenfooter_make / $puttsevenfooter_total;
        $puttsevenfooter_make_percentage_formatted = number_format($puttsevenfooter_make_percentage, 2) * 100 . ' %';

        $putteightfooter_make_percentage = $putteightfooter_make / $putteightfooter_total;
        $putteightfooter_make_percentage_formatted = number_format($putteightfooter_make_percentage, 2) * 100 . ' %';

        $puttninefooter_make_percentage = $puttninefooter_make / $puttninefooter_total;
        $puttninefooter_make_percentage_formatted = number_format($puttninefooter_make_percentage, 2) * 100 . ' %';

        $putttenfooter_make_percentage = $putttenfooter_make / $putttenfooter_total;
        $putttenfooter_make_percentage_formatted = number_format($putttenfooter_make_percentage, 2) * 100 . ' %';

        $puttfourtoeightfeet_total = $puttfourtoeightfeet_make + $puttfourtoeightfeet_miss;
        $puttfourtoeightfeet_makeperentage = $puttfourtoeightfeet_make / ($puttfourtoeightfeet_make + $puttfourtoeightfeet_miss);
        $puttfourtoeightfeet_makeperentage_formatted = number_format($puttfourtoeightfeet_makeperentage, 2) * 100 . ' %';

        $puttinsidetenfeet_total = $puttinsidetenfeet_make + $puttinsidetenfeet_miss;
        $puttinsidetenfeet_makeperentage = $puttinsidetenfeet_make / ($puttinsidetenfeet_make + $puttinsidetenfeet_miss);
        $puttinsidetenfeet_makeperentage_formatted = number_format($puttinsidetenfeet_makeperentage, 2) * 100 . ' %';

        $putttentofifteen_makepercentage = $putttentofifteenfooter_make / ($putttentofifteenfooter_make + $putttentofifteenfooter_miss);
        $putttentofifteen_makepercentage_formatted = number_format($putttentofifteen_makepercentage, 2) * 100 . ' %';

        $puttfifteentotwenty_makepercentage = $puttfifteentotwentyfooter_make / ($puttfifteentotwentyfooter_make + $puttfifteentotwentyfooter_miss);
        $puttfifteentotwenty_makepercentage_formatted = number_format($puttfifteentotwenty_makepercentage, 2) * 100 . ' %';

        $putttwentytotwentyfive_makepercentage = $putttwentytotwentyfivefooter_make / ($putttwentytotwentyfivefooter_make + $putttwentytotwentyfivefooter_miss);
        $putttwentytotwentyfive_makepercentage_formatted = number_format($putttwentytotwentyfive_makepercentage, 2) * 100 . ' %';

        $putttovertwentyfivefooter_makepercentage = $putttovertwentyfivefooter_make / ($putttovertwentyfivefooter_make + $putttovertwentyfivefooter_miss);
        $putttovertwentyfivefooter_makepercentage_formatted = number_format($putttovertwentyfivefooter_makepercentage, 2) * 100 . ' %';

//        dd($longestputtfeet);

        $putting_stats_array = array_add($putting_stats_array, 'total_rounds', $totalrounds);
        $putting_stats_array = array_add($putting_stats_array, 'total_holes', $totalholes);
        $putting_stats_array = array_add($putting_stats_array, 'total_putts', $totalputts);
        $putting_stats_array = array_add($putting_stats_array, 'total_putts_round', $totalputts_round);
        $putting_stats_array = array_add($putting_stats_array, 'total_approach_putt_performance', $totalapproachputtperformance);


        $putting_stats_array = array_add($putting_stats_array, 'lag_putt_efficiency', $lagputtingefficiency);
        $putting_stats_array = array_add($putting_stats_array, 'lag_putt_efficiency_formatted', $lagputtingefficiency_formatted);


        $putting_stats_array = array_add($putting_stats_array, 'birdie_or_better_conversion_percentage', $birdieorbetterconversionpercentage);
        $putting_stats_array = array_add($putting_stats_array, 'birdie_or_better_conversion_percentage_formatted', $birdieorbetterconversionpercentage_formatted);

        $putting_stats_array = array_add($putting_stats_array, 'par_or_better_conversion_percentage', $parorbetterconversionpercentage);
        $putting_stats_array = array_add($putting_stats_array, 'par_or_better_conversion_percentage_formatted', $parorbetterconversionpercentage_formatted);


        $putting_stats_array = array_add($putting_stats_array, 'three_putt_avoidance', $threeputtavoidance);


        $putting_stats_array = array_add($putting_stats_array, 'total_threeputts', $totalthreeputts);
        $putting_stats_array = array_add($putting_stats_array, 'total_twoputts', $totaltwoputts);
        $putting_stats_array = array_add($putting_stats_array, 'total_oneputts', $totaloneputts);
        $putting_stats_array = array_add($putting_stats_array, 'total_zeroputts', $totalzeroputts);

        $putting_stats_array = array_add($putting_stats_array, 'total_putts', $totalputts);
        $putting_stats_array = array_add($putting_stats_array, 'total_putts_round', $totalputts_round);
        $putting_stats_array = array_add($putting_stats_array, 'total_putts_hole', $totalputts_hole);

        $putting_stats_array = array_add($putting_stats_array, 'putting_three_footer_total', $puttthreefooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_three_footer_make', $puttthreefooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_three_footer_miss', $puttthreefooter_miss);
        $putting_stats_array = array_add($putting_stats_array, 'putting_three_footer_make_percentage', $puttthreefooter_make_percentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_three_footer_make_percentage_formatted', $puttthreefooter_make_percentage_formatted);


        $putting_stats_array = array_add($putting_stats_array, 'putting_four_footer_total', $puttfourfooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_four_footer_make', $puttfourfooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_four_footer_miss', $puttfourfooter_miss);
        $putting_stats_array = array_add($putting_stats_array, 'putting_four_footer_make_percentage', $puttfourfooter_make_percentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_four_footer_make_percentage_formatted', $puttfourfooter_make_percentage_formatted);

        $putting_stats_array = array_add($putting_stats_array, 'putting_five_footer_total', $puttfivefooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_five_footer_make', $puttfivefooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_five_footer_miss', $puttfivefooter_miss);
        $putting_stats_array = array_add($putting_stats_array, 'putting_five_footer_make_percentage', $puttfivefooter_make_percentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_five_footer_make_percentage_formatted', $puttfivefooter_make_percentage_formatted);

        $putting_stats_array = array_add($putting_stats_array, 'putting_six_footer_total', $puttsixfooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_six_footer_make', $puttsixfooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_six_footer_miss', $puttsixfooter_miss);
        $putting_stats_array = array_add($putting_stats_array, 'putting_six_footer_make_percentage', $puttsixfooter_make_percentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_six_footer_make_percentage_formatted', $puttsixfooter_make_percentage_formatted);

        $putting_stats_array = array_add($putting_stats_array, 'putting_seven_footer_total', $puttsevenfooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_seven_footer_make', $puttsevenfooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_seven_footer_miss', $puttsevenfooter_miss);
        $putting_stats_array = array_add($putting_stats_array, 'putting_seven_footer_make_percentage', $puttsevenfooter_make_percentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_seven_footer_make_percentage_formatted', $puttsevenfooter_make_percentage_formatted);

        $putting_stats_array = array_add($putting_stats_array, 'putting_eight_footer_total', $putteightfooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_eight_footer_make', $putteightfooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_eight_footer_miss', $putteightfooter_miss);
        $putting_stats_array = array_add($putting_stats_array, 'putting_eight_footer_make_percentage', $putteightfooter_make_percentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_eight_footer_make_percentage_formatted', $putteightfooter_make_percentage_formatted);

        $putting_stats_array = array_add($putting_stats_array, 'putting_nine_footer_total', $puttninefooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_nine_footer_make', $puttninefooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_nine_footer_miss', $puttninefooter_miss);
        $putting_stats_array = array_add($putting_stats_array, 'putting_nine_footer_make_percentage', $puttninefooter_make_percentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_nine_footer_make_percentage_formatted', $puttninefooter_make_percentage_formatted);

        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_footer_total', $putttenfooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_footer_make', $putttenfooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_footer_miss', $putttenfooter_miss);
        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_footer_make_percentage', $putttenfooter_make_percentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_footer_make_percentage_formatted', $putttenfooter_make_percentage_formatted);

        $putting_stats_array = array_add($putting_stats_array, 'putting_four_to_eight_make_percentage', $puttfourtoeightfeet_makeperentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_four_to_eight_make_percentage_formatted', $puttfourtoeightfeet_makeperentage_formatted);
        $putting_stats_array = array_add($putting_stats_array, 'putting_four_to_eight_total', $puttfourtoeightfeet_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_four_to_eight_make', $puttfourtoeightfeet_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_four_to_eight_miss', $puttfourtoeightfeet_miss);

        $putting_stats_array = array_add($putting_stats_array, 'putting_inside_ten_feet_make_percentage', $puttinsidetenfeet_makeperentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_inside_ten_feet_make_percentage_formatted', $puttinsidetenfeet_makeperentage_formatted);
        $putting_stats_array = array_add($putting_stats_array, 'putting_inside_ten_eight_total', $puttinsidetenfeet_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_inside_ten_eight_make', $puttinsidetenfeet_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_inside_ten_eight_miss', $puttinsidetenfeet_miss);

        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_to_fifteen_feet_make_percentage', $putttentofifteen_makepercentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_to_fifteen_feet_make_percentage_formatted', $putttentofifteen_makepercentage_formatted);
        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_to_fifteen_feet_total', $putttentofifteenfooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_to_fifteen_feet_make', $putttentofifteenfooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_ten_to_fifteen_feet_miss', $putttentofifteenfooter_miss);

        $putting_stats_array = array_add($putting_stats_array, 'putting_fiftenn_to_twenty_feet_make_percentage', $puttfifteentotwenty_makepercentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_fiftenn_to_twenty_feet_make_percentage_formatted', $puttfifteentotwenty_makepercentage_formatted);
        $putting_stats_array = array_add($putting_stats_array, 'putting_fiftenn_to_twenty_feet_total', $puttfifteentotwentyfooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_fiftenn_to_twenty_feet_make', $puttfifteentotwentyfooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_fiftenn_to_twenty_feet_miss', $puttfifteentotwentyfooter_miss);

        $putting_stats_array = array_add($putting_stats_array, 'putting_twenty_to_twentyfive_feet_make_percentage', $putttwentytotwentyfive_makepercentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_twenty_to_twentyfive_feet_make_percentage_formatted', $putttwentytotwentyfive_makepercentage_formatted);
        $putting_stats_array = array_add($putting_stats_array, 'putting_twenty_to_twentyfive_feet_total', $putttwentytotwentyfivefooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_twenty_to_twentyfive_feet_make', $putttwentytotwentyfivefooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_twenty_to_twentyfive_feet_miss', $putttwentytotwentyfivefooter_miss);

        $putting_stats_array = array_add($putting_stats_array, 'putting_over_twentyfive_feet_make_percentage', $putttovertwentyfivefooter_makepercentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_over_twentyfive_feet_make_percentage_formatted', $putttovertwentyfivefooter_makepercentage_formatted);
        $putting_stats_array = array_add($putting_stats_array, 'putting_over_twentyfive_feet_make_total', $putttovertwentyfivefooter_total);
        $putting_stats_array = array_add($putting_stats_array, 'putting_over_twentyfive_feet_make', $putttovertwentyfivefooter_make);
        $putting_stats_array = array_add($putting_stats_array, 'putting_over_twentyfive_feet_miss', $putttovertwentyfivefooter_miss);

        $putting_stats_array = array_add($putting_stats_array, 'putting_longest_putt_feet', $longestputtfeet);

        $putting_stats_array = array_add($putting_stats_array, 'putting_one_putt_percentage', $oneputtpercentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_one_putt_percentage_formatted', $oneputtpercentage_formatted);
        $putting_stats_array = array_add($putting_stats_array, 'putting_two_putt_percentage', $twoputtpercentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_two_putt_percentage_formatted', $twoputtpercentage_formatted);
        $putting_stats_array = array_add($putting_stats_array, 'putting_three_putt_percentage', $threeputtpercentage);
        $putting_stats_array = array_add($putting_stats_array, 'putting_three_putt_percentage_formatted', $threeputtpercentage_formatted);



        return $putting_stats_array;

    }

}