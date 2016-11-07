<?php
/**
 * Created by PhpStorm.
 * User: brianmof
 * Date: 11/3/16
 * Time: 6:58 PM
 */

namespace App\Classes;


class Proximity
{

    public static function getProximityStatsRound($round) {
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


        for($i = 1;$i<$round->round_type+1;$i++) {

//            $holefw = 'hole' . $i . '_fw_hit';
//            $holegir = 'hole' . $i . '_gir';
            $holesand = 'hole' . $i . '_sand';
            $holechips = 'hole' . $i . '_number_of_chips';
            $holedistancetogreen = 'hole' . $i . '_distance_to_green';
            $holefirstputtdistance = 'hole' . $i . '_1st_putt_distance';

            if($round->$holedistancetogreen >= 200){
                //distance to green greater than 200
                ++$approaches_from_200yds;
                if($round->$holechips == 0 && $round->$holesand == 0) {
                    $prox_200yds_totalfeet = $prox_200yds_totalfeet + $round->$holefirstputtdistance;
                }
            }
            if($round->$holedistancetogreen >= 175 && $round->$holedistancetogreen < 200){
                //distance to green between 175 and 200 yards
                ++$approaches_175_200yds;
                if($round->$holechips == 0 && $round->$holesand == 0) {
                    $prox_175_200yds_totalfeet = $prox_175_200yds_totalfeet + $round->$holefirstputtdistance;
                }
            }
            if($round->$holedistancetogreen >= 150 && $round->$holedistancetogreen < 175){
                //distance to green between 150 and 175 yards
                ++$approaches_150_175yds;;
                if($round->$holechips == 0 && $round->$holesand == 0) {
                    $prox_150_175yds_totalfeet = $prox_150_175yds_totalfeet + $round->$holefirstputtdistance;
                }
            }
            if($round->$holedistancetogreen >= 130 && $round->$holedistancetogreen < 150){
                //distance to green between 130 and 150 yards
                ++$approaches_130_150yds;
                if($holechips == 0 && $round->$holesand == 0) {
                    $prox_130_150yds_totalfeet = $prox_130_150yds_totalfeet + $round->$holefirstputtdistance;
                }
            }
            if($round->$holedistancetogreen >= 120 && $round->$holedistancetogreen < 130){
                //distance to green between 120 and 130 yards
                ++$approaches_120_130yds;
                if($round->$holechips == 0 && $round->$holesand == 0) {
                    $prox_120_130yds_totalfeet = $prox_120_130yds_totalfeet + $round->$holefirstputtdistance;
                }
            }
            if($round->$holedistancetogreen >= 110 && $round->$holedistancetogreen < 120){
                //distance to green between 110 and 120 yards
                ++$approaches_110_120yds;
                if($round->$holechips == 0 && $round->$holesand == 0) {
                    $prox_110_120yds_totalfeet = $prox_110_120yds_totalfeet + $round->$holefirstputtdistance;
                }
            }
            if($round->$holedistancetogreen >= 100 && $round->$holedistancetogreen < 110){
                //distance to green between 100 and 110 yards
                ++$approaches_100_110yds;
                if($round->$holechips == 0 && $round->$holesand == 0) {
                    $prox_100_110yds_totalfeet = $prox_100_110yds_totalfeet + $round->$holefirstputtdistance;
                }
            }
            if($round->$holedistancetogreen >= 90 && $round->$holedistancetogreen < 100){
                //distance to green between 100 and 110 yards
                ++$approaches_90_100yds;
                if($round->$holechips == 0 && $round->$holesand == 0) {
                    $prox_90_100yds_totalfeet = $prox_90_100yds_totalfeet + $round->$holefirstputtdistance;
                }
            }
            if($round->$holedistancetogreen > 0 && $round->$holedistancetogreen < 90){
                //distance to green between 0 and 90 yards
                ++$approaches_inside_90yds;
                if($round->$holechips == 0 && $round->$holesand == 0) {
                    $prox_inside_90yds_totalfeet = $prox_inside_90yds_totalfeet + $round->$holefirstputtdistance;
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

    public static function getCumulativeProximityStats($rounds) {

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
                    if($round->$holechips == 0 && $round->$holesand == 0) {
                        $prox_200yds_totalfeet = $prox_200yds_totalfeet + $round->$holefirstputtdistance;

//                        dd($approaches_from_200yds);
                    }
                }
                if($round->$holedistancetogreen >= 175 && $round->$holedistancetogreen < 200){
                    //distance to green between 175 and 200 yards
                    ++$approaches_175_200yds;
                    if($round->$holechips == 0 && $round->$holesand == 0) {
                        $prox_175_200yds_totalfeet = $prox_175_200yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 150 && $round->$holedistancetogreen < 175){
                    //distance to green between 150 and 175 yards
                    ++$approaches_150_175yds;;
                    if($round->$holechips == 0 && $round->$holesand == 0) {
                        $prox_150_175yds_totalfeet = $prox_150_175yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 130 && $round->$holedistancetogreen < 150){
                    //distance to green between 130 and 150 yards
                    ++$approaches_130_150yds;
                    if($round->$holechips == 0 && $round->$holesand == 0) {
                        $prox_130_150yds_totalfeet = $prox_130_150yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 120 && $round->$holedistancetogreen < 130){
                    //distance to green between 120 and 130 yards
                    ++$approaches_120_130yds;
                    if($round->$holechips == 0 && $round->$holesand == 0) {
                        $prox_120_130yds_totalfeet = $prox_120_130yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 110 && $round->$holedistancetogreen < 120){
                    //distance to green between 110 and 120 yards
                    ++$approaches_110_120yds;
                    if($round->$holechips == 0 && $round->$holesand == 0) {
                        $prox_110_120yds_totalfeet = $prox_110_120yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 100 && $round->$holedistancetogreen < 110){
                    //distance to green between 100 and 110 yards
                    ++$approaches_100_110yds;
                    if($round->$holechips == 0 && $round->$holesand == 0) {
                        $prox_100_110yds_totalfeet = $prox_100_110yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen >= 90 && $round->$holedistancetogreen < 100){
                    //distance to green between 100 and 110 yards
                    ++$approaches_90_100yds;
                    if($round->$holechips == 0 && $round->$holesand == 0) {
                        $prox_90_100yds_totalfeet = $prox_90_100yds_totalfeet + $round->$holefirstputtdistance;
                    }
                }
                if($round->$holedistancetogreen > 0 && $round->$holedistancetogreen < 90){
                    //distance to green between 0 and 90 yards
                    ++$approaches_inside_90yds;
                    if($round->$holechips == 0 && $round->$holesand == 0) {
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

//        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_200yds', $prox_200yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_200yds', $prox_200yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_175_200yds', $prox_175_200yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_150_175yds', $prox_150_175yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_130_150yds', $prox_130_150yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_120_130yds', $prox_120_130yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_110_120yds', $prox_110_120yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_100_110yds', $prox_100_110yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_90_100yds', $prox_90_100yds);
        $cumulativeproximitystats_array = array_add($cumulativeproximitystats_array, 'prox_inside_90yds', $prox_inside_90yds);

//        dd($cumulativeproximitystats_array);

        return $cumulativeproximitystats_array;
    }




}