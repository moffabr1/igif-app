<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_id')->unsigned()->index();
            $table->integer('scorecard_id')->unsigned()->index();

            $table->integer('hole1_score');
            $table->integer('hole2_score');
            $table->integer('hole3_score');
            $table->integer('hole4_score');
            $table->integer('hole5_score');
            $table->integer('hole6_score');
            $table->integer('hole7_score');
            $table->integer('hole8_score');
            $table->integer('hole9_score');
            $table->integer('hole10_score');
            $table->integer('hole11_score');
            $table->integer('hole12_score');
            $table->integer('hole13_score');
            $table->integer('hole14_score');
            $table->integer('hole15_score');
            $table->integer('hole16_score');
            $table->integer('hole17_score');
            $table->integer('hole18_score');

            $table->integer('hole1_fw_hit');
            $table->integer('hole2_fw_hit');
            $table->integer('hole3_fw_hit');
            $table->integer('hole4_fw_hit');
            $table->integer('hole5_fw_hit');
            $table->integer('hole6_fw_hit');
            $table->integer('hole7_fw_hit');
            $table->integer('hole8_fw_hit');
            $table->integer('hole9_fw_hit');
            $table->integer('hole10_fw_hit');
            $table->integer('hole11_fw_hit');
            $table->integer('hole12_fw_hit');
            $table->integer('hole13_fw_hit');
            $table->integer('hole14_fw_hit');
            $table->integer('hole15_fw_hit');
            $table->integer('hole16_fw_hit');
            $table->integer('hole17_fw_hit');
            $table->integer('hole18_fw_hit');

            $table->integer('hole1_drive_distance');
            $table->integer('hole2_drive_distance');
            $table->integer('hole3_drive_distance');
            $table->integer('hole4_drive_distance');
            $table->integer('hole5_drive_distance');
            $table->integer('hole6_drive_distance');
            $table->integer('hole7_drive_distance');
            $table->integer('hole8_drive_distance');
            $table->integer('hole9_drive_distance');
            $table->integer('hole10_drive_distance');
            $table->integer('hole11_drive_distance');
            $table->integer('hole12_drive_distance');
            $table->integer('hole13_drive_distance');
            $table->integer('hole14_drive_distance');
            $table->integer('hole15_drive_distance');
            $table->integer('hole16_drive_distance');
            $table->integer('hole17_drive_distance');
            $table->integer('hole18_drive_distance');

            $table->integer('hole1_gir');
            $table->integer('hole2_gir');
            $table->integer('hole3_gir');
            $table->integer('hole4_gir');
            $table->integer('hole5_gir');
            $table->integer('hole6_gir');
            $table->integer('hole7_gir');
            $table->integer('hole8_gir');
            $table->integer('hole9_gir');
            $table->integer('hole10_gir');
            $table->integer('hole11_gir');
            $table->integer('hole12_gir');
            $table->integer('hole13_gir');
            $table->integer('hole14_gir');
            $table->integer('hole15_gir');
            $table->integer('hole16_gir');
            $table->integer('hole17_gir');
            $table->integer('hole18_gir');

            $table->integer('hole1_distance_to_green');
            $table->integer('hole2_distance_to_green');
            $table->integer('hole3_distance_to_green');
            $table->integer('hole4_distance_to_green');
            $table->integer('hole5_distance_to_green');
            $table->integer('hole6_distance_to_green');
            $table->integer('hole7_distance_to_green');
            $table->integer('hole8_distance_to_green');
            $table->integer('hole9_distance_to_green');
            $table->integer('hole10_distance_to_green');
            $table->integer('hole11_distance_to_green');
            $table->integer('hole12_distance_to_green');
            $table->integer('hole13_distance_to_green');
            $table->integer('hole14_distance_to_green');
            $table->integer('hole15_distance_to_green');
            $table->integer('hole16_distance_to_green');
            $table->integer('hole17_distance_to_green');
            $table->integer('hole18_distance_to_green');

            $table->integer('hole1_number_of_chips');
            $table->integer('hole2_number_of_chips');
            $table->integer('hole3_number_of_chips');
            $table->integer('hole4_number_of_chips');
            $table->integer('hole5_number_of_chips');
            $table->integer('hole6_number_of_chips');
            $table->integer('hole7_number_of_chips');
            $table->integer('hole8_number_of_chips');
            $table->integer('hole9_number_of_chips');
            $table->integer('hole10_number_of_chips');
            $table->integer('hole11_number_of_chips');
            $table->integer('hole12_number_of_chips');
            $table->integer('hole13_number_of_chips');
            $table->integer('hole14_number_of_chips');
            $table->integer('hole15_number_of_chips');
            $table->integer('hole16_number_of_chips');
            $table->integer('hole17_number_of_chips');
            $table->integer('hole18_number_of_chips');

            $table->integer('hole1_number_of_putts');
            $table->integer('hole2_number_of_putts');
            $table->integer('hole3_number_of_putts');
            $table->integer('hole4_number_of_putts');
            $table->integer('hole5_number_of_putts');
            $table->integer('hole6_number_of_putts');
            $table->integer('hole7_number_of_putts');
            $table->integer('hole8_number_of_putts');
            $table->integer('hole9_number_of_putts');
            $table->integer('hole10_number_of_putts');
            $table->integer('hole11_number_of_putts');
            $table->integer('hole12_number_of_putts');
            $table->integer('hole13_number_of_putts');
            $table->integer('hole14_number_of_putts');
            $table->integer('hole15_number_of_putts');
            $table->integer('hole16_number_of_putts');
            $table->integer('hole17_number_of_putts');
            $table->integer('hole18_number_of_putts');

            $table->integer('hole1_1st_putt_distance');
            $table->integer('hole2_1st_putt_distance');
            $table->integer('hole3_1st_putt_distance');
            $table->integer('hole4_1st_putt_distance');
            $table->integer('hole5_1st_putt_distance');
            $table->integer('hole6_1st_putt_distance');
            $table->integer('hole7_1st_putt_distance');
            $table->integer('hole8_1st_putt_distance');
            $table->integer('hole9_1st_putt_distance');
            $table->integer('hole10_1st_putt_distance');
            $table->integer('hole11_1st_putt_distance');
            $table->integer('hole12_1st_putt_distance');
            $table->integer('hole13_1st_putt_distance');
            $table->integer('hole14_1st_putt_distance');
            $table->integer('hole15_1st_putt_distance');
            $table->integer('hole16_1st_putt_distance');
            $table->integer('hole17_1st_putt_distance');
            $table->integer('hole18_1st_putt_distance');

            $table->integer('hole1_2nd_putt_distance');
            $table->integer('hole2_2nd_putt_distance');
            $table->integer('hole3_2nd_putt_distance');
            $table->integer('hole4_2nd_putt_distance');
            $table->integer('hole5_2nd_putt_distance');
            $table->integer('hole6_2nd_putt_distance');
            $table->integer('hole7_2nd_putt_distance');
            $table->integer('hole8_2nd_putt_distance');
            $table->integer('hole9_2nd_putt_distance');
            $table->integer('hole10_2nd_putt_distance');
            $table->integer('hole11_2nd_putt_distance');
            $table->integer('hole12_2nd_putt_distance');
            $table->integer('hole13_2nd_putt_distance');
            $table->integer('hole14_2nd_putt_distance');
            $table->integer('hole15_2nd_putt_distance');
            $table->integer('hole16_2nd_putt_distance');
            $table->integer('hole17_2nd_putt_distance');
            $table->integer('hole18_2nd_putt_distance');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scores');
    }
}
