<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    protected $fillable =

        [
            'club_id'.
            'course_name'.
            'holes'.
            'par'
        ];

    public $incrementing = false;

    public function club(){

//        return $this->belongsTo('App\Club', 'club_id');
        return $this->belongsTo('App\Club');

    }


}
