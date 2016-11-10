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

    public static function offthetee_cum($user, $n)
    {
        //DRIVING ACCURACY PERCENTAGE (FW HIT) = The percentage of time a tee shot
        // comes to rest in the fairway (regardless of club)
        //DRIVING ACCURACY & SCORES CHART
        //SCORES BY ROUND
        //TOTAL DISTANCE - 3,409	# OF DRIVES - 84
        //FAIRWAYS HIT - 114	POSSIBLE FAIRWAYS - 196

        $rounds = Rounds::roundsAll($user, $n);

        $offthetee_data_array = [];

        $totalrounds = 0;
        $totalholes = 0;

        //DRIVING DISTANCE = The average number of yards for all drives
        //Drive Distance variables
        $total_drive_opportunities = 0;
        $total_drive_distance = 0;
        $avg_drive_distance_all_rounds = 0;

        //Total Fairway Hit & Miss Data variables
        $fwhitcount = 0;
        $fwmissedcount = 0;
        $totalfw_opportunities = 0;

        foreach($rounds as $key => $round) {
            ++$totalrounds;

            for ($i = 1; $i < $round->round_type + 1; $i++) {
                $holefw = 'hole' . $i . '_fw_hit';
                $holepar = 'hole'.$i.'_par';
                $holedrivedistance = 'hole' . $i . '_drive_distance';

                ++$totalholes;

                if($round->scorecard->$holepar > 3 && $round->$holedrivedistance > 0) {
                    //We have a driveable hole with a recorded drive. We dont want to
                    //count the holes where no drive data was entered
                    ++$total_drive_opportunities;
                    $total_drive_distance += $round->$holedrivedistance;
                }
                if($round->$holefw == 1 && $round->scorecard->$holepar > 3){
                    ++$fwhitcount;
                } elseif ($round->$holefw == 0 && $round->scorecard->$holepar > 3) {
                    ++$fwmissedcount;
                }

            }
        }

//        dd($totalholes);

        //Avg Drive Distance per Driveable Hole and Hole that data was entered
        $avg_drive_distance_all_rounds = $total_drive_distance / $total_drive_opportunities;

        //Avg Fairways Hit Percentage
        $totalfw_opportunities = $fwhitcount + $fwmissedcount;
        $totalfw_percentage = $fwhitcount / $totalfw_opportunities;
        $total_fw_percentage_formatted = number_format($totalfw_percentage, 2) * 100 . '%';

        $offthetee_data_array = array_add($offthetee_data_array, 'total_fw_opportunities', $totalfw_opportunities);
        $offthetee_data_array = array_add($offthetee_data_array, 'total_fw_hit', $fwhitcount);
        $offthetee_data_array = array_add($offthetee_data_array, 'total_fw_percentage', $totalfw_percentage);
        $offthetee_data_array = array_add($offthetee_data_array, 'total_fw_percentage_formatted', $total_fw_percentage_formatted);

        $offthetee_data_array = array_add($offthetee_data_array, 'total_drive_distance', $total_drive_distance);
        $offthetee_data_array = array_add($offthetee_data_array, 'total_drive_distance_opportunities', $total_drive_opportunities);
        $offthetee_data_array = array_add($offthetee_data_array, 'avg_drive_distance_all_rounds', $avg_drive_distance_all_rounds);

        return $offthetee_data_array;
    }

    public static function drive_distance_round($user, $n)
    {

        $rounds = Rounds::roundsAll($user, $n);
        $totalrounds = 0;

        foreach($rounds as $key => $round) {
            ++$totalrounds;
            $round_id = $round->id;
            $date_round = $round->round_date;
            $score_round = 0;
            $total_driving_round = 0;
            $number_of_holes_eligible_round = 0;

            for ($i = 1; $i < $round->round_type + 1; $i++) {
                $holedrivedistance = 'hole' . $i . '_drive_distance';
                $holepar = 'hole'.$i.'_par';
                $holescore = 'hole' . $i . '_score';

//                $score_round += $round->$holescore;
//                $drive_distance_by_round_array[$key]['round_score'] = $score_round;

                if ($round->$holedrivedistance > 0 && $round->scorecard->$holepar > 3) {
                    ++$number_of_holes_eligible_round;
                    $total_driving_round += $round->$holedrivedistance;
                    $avg_drive_distance_by_round = $total_driving_round / $number_of_holes_eligible_round;
                    $avg_drive_distance_by_round_wholenumber = number_format($avg_drive_distance_by_round, 0);
                    $avg_drive_distance_by_round_formatted = number_format($avg_drive_distance_by_round, 0) . ' Yards';

                    $drive_distance_by_round_array[$round_id]['round_id'] = $round_id;
                    $drive_distance_by_round_array[$round_id]['date_round'] = $date_round;
                    $drive_distance_by_round_array[$round_id]['driving_distance_round'] = $total_driving_round;
                    $drive_distance_by_round_array[$round_id]['nummber_of_holes_eligible_round'] = $number_of_holes_eligible_round;
                    $drive_distance_by_round_array[$round_id]['avg_driving_distance_round'] = $avg_drive_distance_by_round;
                    $drive_distance_by_round_array[$round_id]['avg_driving_distance_round_wholenumber'] = $avg_drive_distance_by_round_wholenumber;
                    $drive_distance_by_round_array[$round_id]['avg_driving_distance_round_formatted'] = $avg_drive_distance_by_round_formatted;

                }
            }
        }

        foreach($drive_distance_by_round_array as $key => $array){

            $drive_distance_by_round_array[$key]['total_rounds'] = $totalrounds;
        }

        $drive_distance_by_round_array_formatted = array_reverse($drive_distance_by_round_array, false);

//        dd($drive_distance_by_round_array_formatted);

        return $drive_distance_by_round_array_formatted;

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



//    public static function offthetee_totals($user, $n)
//    {
//        //DRIVING ACCURACY PERCENTAGE (FW HIT) = The percentage of time a tee shot
//        // comes to rest in the fairway (regardless of club)
//        //DRIVING ACCURACY & SCORES CHART
//        //SCORES BY ROUND
//        //TOTAL DISTANCE - 3,409	# OF DRIVES - 84
//        //FAIRWAYS HIT - 114	POSSIBLE FAIRWAYS - 196
//
//        $rounds = Rounds::roundsAll($user, $n);
//
//        $offthetee_data_array = [];
//
//        $totalrounds = 0;
//        $totalholes = 0;
//
//        //DRIVING DISTANCE = The average number of yards for all drives
//        //Drive Distance variables
//        $total_drive_opportunities = 0;
//        $total_drive_distance = 0;
//        $avg_drive_distance_all_rounds = 0;
//
//        //Total Fairway Hit & Miss Data variables
//        $fwhitcount = 0;
//        $fwmissedcount = 0;
//        $totalfw_opportunities = 0;
//
//        foreach($rounds as $key => $round) {
//            ++$totalrounds;
//
//            for ($i = 1; $i < $round->round_type + 1; $i++) {
//                $holefw = 'hole' . $i . '_fw_hit';
//                $holepar = 'hole'.$i.'_par';
//                $holegir = 'hole' . $i . '_gir';
//                $holescore = 'hole' . $i . '_score';
//                $holeputts = 'hole' . $i . '_number_of_putts';
//                $holechips = 'hole' . $i . '_number_of_chips';
//                $holesand = 'hole' . $i . '_sand';
//                $holedrivedistance = 'hole' . $i . '_drive_distance';
//
//                ++$totalholes;
//
//                if($round->scorecard->$holepar > 3 && $round->$holedrivedistance > 0) {
//                    //We have a driveable hole with a recorded drive. We dont want to
//                    //count the holes where no drive data was entered
//                    ++$total_drive_opportunities;
//                    $total_drive_distance += $round->$holedrivedistance;
//                }
//                if($round->$holefw == 1 && $round->scorecard->$holepar > 3){
//                    ++$fwhitcount;
//                } elseif ($round->$holefw == 0 && $round->scorecard->$holepar > 3) {
//                    ++$fwmissedcount;
//                }
//
//            }
//        }
//
//        //Avg Drive Distance per Driveable Hole and Hole that data was entered
//        $avg_drive_distance_all_rounds = $total_drive_distance / $total_drive_opportunities;
//
//        //Avg Fairways Hit Percentage
//        $totalfw_opportunities = $fwhitcount + $fwmissedcount;
//        $totalfw_percentage = $fwhitcount / $totalfw_opportunities;
//        $total_fw_percentage_formatted = number_format($totalfw_percentage, 2) * 100 . '%';
//
//        $offthetee_data_array = array_add($offthetee_data_array, 'total_fw_opportunities', $totalfw_opportunities);
//        $offthetee_data_array = array_add($offthetee_data_array, 'total_fw_hit', $fwhitcount);
//        $offthetee_data_array = array_add($offthetee_data_array, 'total_fw_percentage', $totalfw_percentage);
//        $offthetee_data_array = array_add($offthetee_data_array, 'total_fw_percentage_formatted', $total_fw_percentage_formatted);
//
//        $offthetee_data_array = array_add($offthetee_data_array, 'total_drive_distance', $total_drive_distance);
//        $offthetee_data_array = array_add($offthetee_data_array, 'total_drive_distance_opportunities', $total_drive_opportunities);
//        $offthetee_data_array = array_add($offthetee_data_array, 'avg_drive_distance_all_rounds', $avg_drive_distance_all_rounds);
//
//        return $offthetee_data_array;
//    }



}


