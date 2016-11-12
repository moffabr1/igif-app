<?php
/**
 * Created by PhpStorm.
 * User: brianmof
 * Date: 11/10/16
 * Time: 8:02 PM
 */

namespace App\Classes;


class Scoring
{
    public static function scoring_cum($user, $n)
    {
        $rounds = Rounds::roundsAll($user, $n);

        $scores_array = $rounds->pluck('total_score');
        $lowest_round = $scores_array->min();
        $scoring_avg = (float)number_format($scores_array->avg(), 2);

//        dd($scoring_avg);

        $scoring_cum_data_array = [];

        $totalrounds = 0;
        $totalstrokes = 0;
        $totalholes = 0;
        $totalpars = 0;
        $totalbirdies = 0;
        $totaleagles = 0;
        $totaldbleagles = 0;
        $totalbogeys = 0;
        $totaldblbogeys = 0;
        $total3plusbogeys = 0;

        $total_front_9_holes = 0;
        $front_9_scoring_total = 0;

        $total_back_9_holes = 0;
        $back_9_scoring_total = 0;

        foreach($rounds as $key => $round) {
            ++$totalrounds;

            for ($i = 1; $i < $round->round_type + 1; $i++) {

                $holepar = 'hole'.$i.'_par';
                $holescore = 'hole' . $i . '_score';

                $totalholes = $totalholes + 1;
                $totalstrokes += $round->$holescore;

                if($i < 10){
                    ++$total_front_9_holes;
                    $front_9_scoring_total += $round->$holescore;
                }
                else {
                    ++$total_back_9_holes;
                    $back_9_scoring_total += $round->$holescore;
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
            }
        }

        $front_9_scoring_avg = number_format($front_9_scoring_total / $totalrounds, 1);
        $back_9_scoring_avg = number_format($back_9_scoring_total / $totalrounds, 1);
        $totalpars_round = number_format($totalpars / $totalrounds, 2);
        $totalbirdies_round = number_format($totalbirdies / $totalrounds, 2);
        $totaleagles_round = number_format($totaleagles / $totalrounds, 2);
        $totaldbleagles_round = number_format($totaldbleagles / $totalrounds, 2);
        $totalbogeys_round = number_format($totalbogeys / $totalrounds, 2);
        $totaldblbogeys_round = number_format($totaldblbogeys / $totalrounds, 2);
        $total3plusbogeys_round = number_format($total3plusbogeys / $totalrounds, 2);
        $total_pars_per_hole = number_format($totalpars / $totalholes, 2);
        $total_bogeys_per_hole = number_format($totalbogeys / $totalholes, 2);
        $total_birdies_per_hole = number_format($totalbirdies / $totalholes, 2);

        $total_par_or_better_pctg = number_format((($totalpars + $totalbirdies) / $totalholes), 2);

//        dd($total_par_or_better_pctg);
//
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'lowest_round', $lowest_round);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'scoring_avg', $scoring_avg);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_rounds', $totalrounds);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_holes', $totalholes);

        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'front_9_scoring_avg', $front_9_scoring_avg);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'back_9_scoring_avg', $back_9_scoring_avg);

        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_pars', $totalpars);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_birdies', $totalbirdies);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_eagles', $totaleagles);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_dbleagles', $totaldbleagles);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_bogeys', $totalbogeys);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_dblbogeys', $totaldblbogeys);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_3plusbogeys', $total3plusbogeys);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_pars_round', $totalpars_round);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_birdies_round', $totalbirdies_round);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_eagles_round', $totaleagles_round);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_dbleagles_round', $totaldbleagles_round);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_bogeys_round', $totalbogeys_round);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_dblbogeys_round', $totaldblbogeys_round);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_3plusbogeys_round', $total3plusbogeys_round);

        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_bogeys_hole', $total_bogeys_per_hole);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_pars_hole', $total_pars_per_hole);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_birdies_hole', $total_birdies_per_hole);
        $scoring_cum_data_array = array_add($scoring_cum_data_array, 'total_par_or_better_pctg', $total_par_or_better_pctg);

        dd($scoring_cum_data_array);

        return $scoring_cum_data_array;
    }

}
//LOWEST ROUND
//SCORING AVERAGE (ACTUAL)
//BIRDIE AVERAGE
//TOTAL BIRDIES
//BOGEYS (HOLES PER)
//PARS (HOLES PER)
//BIRDIES (HOLES PER)
//FRONT 9 SCORING AVERAGE
//BACK 9 SCORING AVERAGE
//PAR 3 SCORING AVERAGE
//PAR 4 SCORING AVERAGE
//PAR 5 SCORING AVERAG
//BIRDIE OR BETTER PERCENTAGE (HOLES)
//BOUNCE BACK (HOW MANY TIMES AFTER BOGEY or HIGHER SCORE PAR OR LESS)