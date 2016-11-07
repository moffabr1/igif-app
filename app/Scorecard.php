<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scorecard extends Model
{
    //
    protected $fillable = [
        'club_id',
        'course_id',
        'tee_id',
        'tee_color',
        'course_par_for_tee',
        'rating',
        'slope',
        'hole1_distance',
        'hole2_distance',
        'hole3_distance',
        'hole4_distance',
        'hole5_distance',
        'hole6_distance',
        'hole7_distance',
        'hole8_distance',
        'hole9_distance',
        'hole10_distance',
        'hole11_distance',
        'hole12_distance',
        'hole13_distance',
        'hole14_distance',
        'hole15_distance',
        'hole16_distance',
        'hole17_distance',
        'hole18_distance',
        'total_distance',
        'hole1_par',
        'hole2_par',
        'hole3_par',
        'hole4_par',
        'hole5_par',
        'hole6_par',
        'hole7_par',
        'hole8_par',
        'hole9_par',
        'hole10_par',
        'hole11_par',
        'hole12_par',
        'hole13_par',
        'hole14_par',
        'hole15_par',
        'hole16_par',
        'hole17_par',
        'hole18_par',
        'hole1_handicap',
        'hole2_handicap',
        'hole3_handicap',
        'hole4_handicap',
        'hole5_handicap',
        'hole6_handicap',
        'hole7_handicap',
        'hole8_handicap',
        'hole9_handicap',
        'hole10_handicap',
        'hole11_handicap',
        'hole12_handicap',
        'hole13_handicap',
        'hole14_handicap',
        'hole15_handicap',
        'hole16_handicap',
        'hole17_handicap',
        'hole18_handicap'

    ];

    public $incrementing = false;

    public function course(){

        return $this->belongsTo('App\Course');

    }

    public function club(){

        return $this->belongsTo('App\Club');

    }

    public function score() {

        return $this->hasMany('App\Scores');

    }

}