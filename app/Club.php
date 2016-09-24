<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    //

    protected $fillable =

    [
        'id',
        'club_name',
        'number_of_holes',
        'address',
        'city_name',
        'state_province_name',
        'country_name',
        'postal_code',
        'phone_number',
        'website',
        'longitude',
        'latitude'
    ];

    public $incrementing = false;

    public function course() {

        return $this->hasMany('App\Course');

    }

    public function scorecards() {

        return $this->hasMany('App\Scorecards');

    }


}
