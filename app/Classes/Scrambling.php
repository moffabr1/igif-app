<?php
/**
 * Created by PhpStorm.
 * User: brianmof
 * Date: 11/8/16
 * Time: 11:16 AM
 */

namespace App\Classes;


class Scrambling
{
    public static function scrambling($user, $n)
    {

        $rounds = Rounds::roundsAll($user, $n);

//        dd($rounds);

        $scrambling_data_array = [];

        $scrambling_opportunities = 0;
        $scrambling_success = 0;
        $scrambling_percentage = 0;
        $scrambling_percentage_formatted = 0;

        $scrambling_over30_opportunities = 0;
        $scrambling_over30_success = 0;
        $scrambling_over30_percentage = 0;
        $scrambling_over30_percentage_formatted = 0;

        $scrambling_chipping_opportunities = 0;
        $scrambling_chipping_success = 0;
        $scrambling_chipping_percentage = 0;
        $scrambling_chipping_percentage_formatted = 0;

        $scrambling_sand_opportunities = 0;
        $scrambling_sand_success = 0;
        $scrambling_sand_percentage = 0;
        $scrambling_sand_percentage_formatted = 0;


        foreach ($rounds as $key => $round) {
            // do stuff

            for ($i = 1; $i < $round->round_type + 1; $i++) {

                $holepar = 'hole' . $i . '_par';
                $holegir = 'hole' . $i . '_gir';
                $holescore = 'hole' . $i . '_score';
                $holedistancetogreen = 'hole' . $i . '_distance_to_green';
                $holechip = 'hole' . $i . '_number_of_chips';
                $holesand = 'hole' . $i . '_sand';

                if($round->$holegir == 0) {
                    ++$scrambling_opportunities;

                    if ($round->$holescore <= $round->scorecard->$holepar) {
                        ++$scrambling_success;
                    }
                    if($round->$holegir == 0 && $round->$holechip > 0){
                        ++$scrambling_chipping_opportunities;

                        if ($round->$holescore <= $round->scorecard->$holepar) {
                            ++$scrambling_chipping_success;

                        }
                    }
                    if($round->$holegir == 0 && $round->$holesand > 0){
                        ++$scrambling_sand_opportunities;

                        if ($round->$holescore <= $round->scorecard->$holepar) {
                            ++$scrambling_sand_success;

                        }
                    }
                }
                If($round->$holedistancetogreen <> 0){

                    if($round->$holegir == 0 && $round->$holedistancetogreen >= 30){
                        ++$scrambling_over30_opportunities;

                        if ($round->$holescore <= $round->scorecard->$holepar) {
                            ++$scrambling_over30_success;

                        }
                    }
                }

            }
        }

//        dd($scrambling_over30_opportunities);

        $scrambling_percentage = $scrambling_success / $scrambling_opportunities;
        $scrambling_percentage_formatted = number_format($scrambling_percentage, 2) * 100 . '%';

        $scrambling_over30_percentage = $scrambling_over30_success / $scrambling_over30_opportunities;
        $scrambling_over30_percentage_formatted = number_format($scrambling_over30_percentage, 2) * 100 . '%';

        $scrambling_chipping_percentage = $scrambling_chipping_success / $scrambling_chipping_opportunities;
        $scrambling_chipping_percentage_formatted = number_format($scrambling_chipping_percentage, 2) * 100 . '%';

        $scrambling_sand_percentage = $scrambling_sand_success / $scrambling_sand_opportunities;
        $scrambling_sand_percentage_formatted = number_format($scrambling_sand_percentage, 2) * 100 . '%';


//        dd($scrambling_sand_opportunities);


        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_opportunities', $scrambling_opportunities);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_over30_opportunities', $scrambling_over30_opportunities);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_chipping_opportunities', $scrambling_chipping_opportunities);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_sand_opportunities', $scrambling_sand_opportunities);

        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_success', $scrambling_success);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_over30_success', $scrambling_over30_success);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_chippipng_success', $scrambling_chipping_success);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_sand_success', $scrambling_sand_success);

        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_percentage', $scrambling_percentage);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_percentage_formatted', $scrambling_percentage_formatted);

        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_over30_percentage', $scrambling_over30_percentage);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_over30_percentage_formatted', $scrambling_over30_percentage_formatted);

        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_chipping_percentage', $scrambling_chipping_percentage);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_chipping_percentage_formatted', $scrambling_chipping_percentage_formatted);

        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_sand_percentage', $scrambling_sand_percentage);
        $scrambling_data_array = array_add($scrambling_data_array, 'scrambling_sand_percentage_formatted', $scrambling_sand_percentage_formatted);

//        dd($scrambling_data_array);

        return $scrambling_data_array;

    }
}