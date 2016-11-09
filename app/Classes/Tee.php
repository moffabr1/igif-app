<?php
/**
 * Created by PhpStorm.
 * User: brianmof
 * Date: 11/8/16
 * Time: 9:08 PM
 */

namespace App\Classes;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tee
{

    public static function offthetee_totals($user, $n)
    {
        $rounds = Rounds::roundsAll($user, $n);

//        dd($rounds);

        $offthetee_data_array = [];

        $totalrounds = 0;
        $totalholes = 0;

        //Drive Distance Variables
        $total_drive_holes = 0;
        $total_drive_distance = 0;
        $avg_drive_distance_all_rounds = 0;

        //DRIVING DISTANCE = The average number of yards for all drives
        $driving_distance_avg = 0;

        $myArray = array();
        $aMemberships = [];

        foreach($rounds as $key => $round) {
            ++$totalrounds;

            for ($i = 1; $i < $round->round_type + 1; $i++) {
                $holefw = 'hole' . $i . '_fw_hit';
                $holepar = 'hole'.$i.'_par';
                $holegir = 'hole' . $i . '_gir';
                $holescore = 'hole' . $i . '_score';
                $holeputts = 'hole' . $i . '_number_of_putts';
                $holechips = 'hole' . $i . '_number_of_chips';
                $holesand = 'hole' . $i . '_sand';
                $holedrivedistance = 'hole' . $i . '_drive_distance';

                ++$totalholes;

                $myArray[] = array(
                    $holedrivedistance => $round->$holedrivedistance,
                    $holechips => $round->$holechips,
                    $holefw => $round->$holefw
                );
//                $myArray[] = $aMemberships[$round['ID']] = $round[$round->$holepar];

                if($round->scorecard->$holepar > 3 && $round->$holedrivedistance > 0) {
                    //We have a driveable hole with a recorded drive. We dont want to
                    //count the holes where no drive data was entered
                    ++$total_drive_holes;
                    $total_drive_distance += $round->$holedrivedistance;


                }
            }
        }

        //Avg Drive Distance per Driveable Hole and Hole that data was entered
        $avg_drive_distance_all_rounds = $total_drive_distance / $total_drive_holes;

//        dd($avg_drive_distance_all_rounds);
        dd($myArray);



        return $offthetee_data_array;

//DRIVING ACCURACY PERCENTAGE (FW HIT) = The percentage of time a tee shot
// comes to rest in the fairway (regardless of club)
//DRIVING ACCURACY & SCORES CHART
//SCORES BY ROUND
//TOTAL DISTANCE - 3,409	# OF DRIVES - 84
//FAIRWAYS HIT - 114	POSSIBLE FAIRWAYS - 196
    }

    public static function fw_hit_round($n) {

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

        $fw_hit_reversed = array_reverse($fw_hit, false);

        return($fw_hit_reversed);

    }

    public static function offthetee_round($user, $n)
    {

    }
}


