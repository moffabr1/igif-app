<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScoresTableSeeder9Holes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {

//            $year = rand(2009, 2016);
//            $month = rand(1, 12);
//            $day = rand(1, 28);

            $year = rand(2016, 2016);
            $month = rand(10, 10);
            $day = rand(27, 28);

            $date = Carbon::create($year,$month ,$day , 0, 0, 0);



            DB::table('scores')->insert([ //,
//                'name' => $faker->name,
//                'email' => $faker->unique()->email,
//                'contact_number' => $faker->phoneNumber,

                'user_id' => $faker->numberBetween($min = 1, $max = 1),
                'scorecard_id' => $faker->numberBetween($min = 59, $max = 61),
                'course_id' => $faker->numberBetween($min = 26, $max = 26),
                'club_id' => $faker->numberBetween($min = 26, $max = 26),
                'total_score' => $faker->numberBetween($min = 30, $max = 50),
//                'round_date' => date($format = 'Y-m-d'),
                //'round_date' => $date->format('Y-m-d'),
                'round_date' => $date,
                'round_type' => 9,
                'hole1_score' => $faker->numberBetween($min = 3, $max = 6),
                'hole2_score' => $faker->numberBetween($min = 3, $max = 6),
                'hole3_score' => $faker->numberBetween($min = 3, $max = 6),
                'hole4_score' => $faker->numberBetween($min = 3, $max = 6),
                'hole5_score' => $faker->numberBetween($min = 3, $max = 6),
                'hole6_score' => $faker->numberBetween($min = 3, $max = 6),
                'hole7_score' => $faker->numberBetween($min = 3, $max = 6),
                'hole8_score' => $faker->numberBetween($min = 3, $max = 6),
                'hole9_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole10_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole11_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole12_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole13_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole14_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole15_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole16_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole17_score' => $faker->numberBetween($min = 3, $max = 6),
//                'hole18_score' => $faker->numberBetween($min = 3, $max = 6),

                'hole1_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
                'hole2_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
                'hole3_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
                'hole4_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
                'hole5_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
                'hole6_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
                'hole7_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
                'hole8_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
                'hole9_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole10_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole11_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole12_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole13_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole14_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole15_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole16_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole17_fw_hit' => $faker->numberBetween($min = 0, $max = 1),
//                'hole18_fw_hit' => $faker->numberBetween($min = 0, $max = 1),

                'hole1_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
                'hole2_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
                'hole3_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
                'hole4_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
                'hole5_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
                'hole6_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
                'hole7_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
                'hole8_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
                'hole9_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole10_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole11_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole12_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole13_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole14_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole15_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole16_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole17_drive_distance' => $faker->numberBetween($min = 150, $max = 300),
//                'hole18_drive_distance' => $faker->numberBetween($min = 150, $max = 300),

                'hole1_gir' => $faker->numberBetween($min = 0, $max = 1),
                'hole2_gir' => $faker->numberBetween($min = 0, $max = 1),
                'hole3_gir' => $faker->numberBetween($min = 0, $max = 1),
                'hole4_gir' => $faker->numberBetween($min = 0, $max = 1),
                'hole5_gir' => $faker->numberBetween($min = 0, $max = 1),
                'hole6_gir' => $faker->numberBetween($min = 0, $max = 1),
                'hole7_gir' => $faker->numberBetween($min = 0, $max = 1),
                'hole8_gir' => $faker->numberBetween($min = 0, $max = 1),
                'hole9_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole10_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole11_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole12_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole13_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole14_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole15_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole16_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole17_gir' => $faker->numberBetween($min = 0, $max = 1),
//                'hole18_gir' => $faker->numberBetween($min = 0, $max = 1),

                'hole1_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
                'hole2_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
                'hole3_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
                'hole4_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
                'hole5_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
                'hole6_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
                'hole7_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
                'hole8_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
                'hole9_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole10_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole11_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole12_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole13_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole14_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole15_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole16_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole17_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),
//                'hole18_distance_to_green' => $faker->numberBetween($min = 80, $max = 200),

                'hole1_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
                'hole2_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
                'hole3_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
                'hole4_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
                'hole5_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
                'hole6_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
                'hole7_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
                'hole8_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
                'hole9_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole10_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole11_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole12_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole13_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole14_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole15_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole16_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole17_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),
//                'hole18_number_of_chips' => $faker->numberBetween($min = 0, $max = 2),

                'hole1_sand' => $faker->numberBetween($min = 0, $max = 1),
                'hole2_sand' => $faker->numberBetween($min = 0, $max = 1),
                'hole3_sand' => $faker->numberBetween($min = 0, $max = 1),
                'hole4_sand' => $faker->numberBetween($min = 0, $max = 1),
                'hole5_sand' => $faker->numberBetween($min = 0, $max = 1),
                'hole6_sand' => $faker->numberBetween($min = 0, $max = 1),
                'hole7_sand' => $faker->numberBetween($min = 0, $max = 1),
                'hole8_sand' => $faker->numberBetween($min = 0, $max = 1),
                'hole9_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole10_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole11_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole12_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole13_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole14_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole15_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole16_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole17_sand' => $faker->numberBetween($min = 0, $max = 1),
//                'hole18_sand' => $faker->numberBetween($min = 0, $max = 1),

                'hole1_number_of_putts' => $faker->numberBetween($min = 0, $max = 3),
                'hole2_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
                'hole3_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
                'hole4_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
                'hole5_number_of_putts' => $faker->numberBetween($min = 0, $max = 3),
                'hole6_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
                'hole7_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
                'hole8_number_of_putts' => $faker->numberBetween($min = 0, $max = 3),
                'hole9_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole10_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole11_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole12_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole13_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole14_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole15_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole16_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole17_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),
//                'hole18_number_of_putts' => $faker->numberBetween($min = 0, $max = 2),

                'hole1_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
                'hole2_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
                'hole3_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
                'hole4_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
                'hole5_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
                'hole6_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
                'hole7_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
                'hole8_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
                'hole9_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole10_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole11_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole12_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole13_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole14_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole15_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole16_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole17_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),
//                'hole18_1st_putt_distance' => $faker->numberBetween($min = 3, $max = 50),

                'hole1_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
                'hole2_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
                'hole3_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
                'hole4_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
                'hole5_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
                'hole6_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
                'hole7_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
                'hole8_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
                'hole9_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole10_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole11_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole12_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole13_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole14_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole15_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole16_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole17_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),
//                'hole18_2nd_putt_distance' => $faker->numberBetween($min = 1, $max = 10),


            ]);
        }
    }
}
