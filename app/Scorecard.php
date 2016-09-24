<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scorecard extends Model
{
    //
    protected $fillable = [

        'course_id',
        'club_id',
        'tee_name',
        'tee_color'

    ];

    public $incrementing = false;

    public function course(){

        return $this->belongsTo('App\Course');

    }

    public function club(){

        return $this->belongsTo('App\Club');

    }
}