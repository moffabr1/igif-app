<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    //

    public function scopeScoreingavg($query)
    {
//        return $query->where('votes', '>', 100);
        return $query->where('user_id', Auth::user()->id)->first()->avg('total_score');
    }

    public function getRoundDateAttribute(){
        return date('m-d-Y', strtotime($this->attributes['round_date']));
    }

    protected $fillable =
        [
            'user_id',
            'scorecard_id',
            'club_id',
            'course_id',
            'total_score',
            'round_date',
            'hole1_score',
            'hole2_score',
            'hole3_score',
            'hole4_score',
            'hole5_score',
            'hole6_score',
            'hole7_score',
            'hole8_score',
            'hole9_score',
            'hole10_score',
            'hole11_score',
            'hole12_score',
            'hole13_score',
            'hole14_score',
            'hole15_score',
            'hole16_score',
            'hole17_score',
            'hole18_score',

            'hole1_fw_hit',
            'hole2_fw_hit',
            'hole3_fw_hit',
            'hole4_fw_hit',
            'hole5_fw_hit',
            'hole6_fw_hit',
            'hole7_fw_hit',
            'hole8_fw_hit',
            'hole9_fw_hit',
            'hole10_fw_hit',
            'hole11_fw_hit',
            'hole12_fw_hit',
            'hole13_fw_hit',
            'hole14_fw_hit',
            'hole15_fw_hit',
            'hole16_fw_hit',
            'hole17_fw_hit',
            'hole18_fw_hit',

            'hole1_drive_distance',
            'hole2_drive_distance',
            'hole3_drive_distance',
            'hole4_drive_distance',
            'hole5_drive_distance',
            'hole6_drive_distance',
            'hole7_drive_distance',
            'hole8_drive_distance',
            'hole9_drive_distance',
            'hole10_drive_distance',
            'hole11_drive_distance',
            'hole12_drive_distance',
            'hole13_drive_distance',
            'hole14_drive_distance',
            'hole15_drive_distance',
            'hole16_drive_distance',
            'hole17_drive_distance',
            'hole18_drive_distance',

            'hole1_gir',
            'hole2_gir',
            'hole3_gir',
            'hole4_gir',
            'hole5_gir',
            'hole6_gir',
            'hole7_gir',
            'hole8_gir',
            'hole9_gir',
            'hole10_gir',
            'hole11_gir',
            'hole12_gir',
            'hole13_gir',
            'hole14_gir',
            'hole15_gir',
            'hole16_gir',
            'hole17_gir',
            'hole18_gir',

            'hole1_distance_to_green',
            'hole2_distance_to_green',
            'hole3_distance_to_green',
            'hole4_distance_to_green',
            'hole5_distance_to_green',
            'hole6_distance_to_green',
            'hole7_distance_to_green',
            'hole8_distance_to_green',
            'hole9_distance_to_green',
            'hole10_distance_to_green',
            'hole11_distance_to_green',
            'hole12_distance_to_green',
            'hole13_distance_to_green',
            'hole14_distance_to_green',
            'hole15_distance_to_green',
            'hole16_distance_to_green',
            'hole17_distance_to_green',
            'hole18_distance_to_green',

            'hole1_number_of_chips',
            'hole2_number_of_chips',
            'hole3_number_of_chips',
            'hole4_number_of_chips',
            'hole5_number_of_chips',
            'hole6_number_of_chips',
            'hole7_number_of_chips',
            'hole8_number_of_chips',
            'hole9_number_of_chips',
            'hole10_number_of_chips',
            'hole11_number_of_chips',
            'hole12_number_of_chips',
            'hole13_number_of_chips',
            'hole14_number_of_chips',
            'hole15_number_of_chips',
            'hole16_number_of_chips',
            'hole17_number_of_chips',
            'hole18_number_of_chips',

            'hole1_sand',
            'hole2_sand',
            'hole3_sand',
            'hole4_sand',
            'hole5_sand',
            'hole6_sand',
            'hole7_sand',
            'hole8_sand',
            'hole9_sand',
            'hole10_sand',
            'hole11_sand',
            'hole12_sand',
            'hole13_sand',
            'hole14_sand',
            'hole15_sand',
            'hole16_sand',
            'hole17_sand',
            'hole18_sand',

            'hole1_number_of_putts',
            'hole2_number_of_putts',
            'hole3_number_of_putts',
            'hole4_number_of_putts',
            'hole5_number_of_putts',
            'hole6_number_of_putts',
            'hole7_number_of_putts',
            'hole8_number_of_putts',
            'hole9_number_of_putts',
            'hole10_number_of_putts',
            'hole11_number_of_putts',
            'hole12_number_of_putts',
            'hole13_number_of_putts',
            'hole14_number_of_putts',
            'hole15_number_of_putts',
            'hole16_number_of_putts',
            'hole17_number_of_putts',
            'hole18_number_of_putts',

            'hole1_1st_putt_distance',
            'hole2_1st_putt_distance',
            'hole3_1st_putt_distance',
            'hole4_1st_putt_distance',
            'hole5_1st_putt_distance',
            'hole6_1st_putt_distance',
            'hole7_1st_putt_distance',
            'hole8_1st_putt_distance',
            'hole9_1st_putt_distance',
            'hole10_1st_putt_distance',
            'hole11_1st_putt_distance',
            'hole12_1st_putt_distance',
            'hole13_1st_putt_distance',
            'hole14_1st_putt_distance',
            'hole15_1st_putt_distance',
            'hole16_1st_putt_distance',
            'hole17_1st_putt_distance',
            'hole18_1st_putt_distance',

            'hole1_2nd_putt_distance',
            'hole2_2nd_putt_distance',
            'hole3_2nd_putt_distance',
            'hole4_2nd_putt_distance',
            'hole5_2nd_putt_distance',
            'hole6_2nd_putt_distance',
            'hole7_2nd_putt_distance',
            'hole8_2nd_putt_distance',
            'hole9_2nd_putt_distance',
            'hole10_2nd_putt_distance',
            'hole11_2nd_putt_distance',
            'hole12_2nd_putt_distance',
            'hole13_2nd_putt_distance',
            'hole14_2nd_putt_distance',
            'hole15_2nd_putt_distance',
            'hole16_2nd_putt_distance',
            'hole17_2nd_putt_distance',
            'hole18_2nd_putt_distance',


        ];

    protected $dates = ['round_date'];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scorecard(){
        return $this->belongsTo('App\Scorecard');
    }

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function club() {
        return $this->belongsTo('App\Club');
    }
}
