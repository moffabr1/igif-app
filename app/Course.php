<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    protected $fillable =

        [
//            'course_id',
            'club_id'.
            'course_name'.
            'holes'.
            'par'
        ];

    public $incrementing = false;

    public function club(){

        return $this->belongsTo('App\Club');

    }

    public function scorecard(){

        return $this->hasMany('App\Scorecard');

    }


}
