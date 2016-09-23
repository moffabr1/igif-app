<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    //

    protected $fillable =

    [
        'club_id',
        'club_name'.
        'number_of_holes'.
        'address'.
        'city_name'.
        'state_province_name'.
        'country_name'.
        'postal_code'.
        'phone_number'.
        'website'.
        'longitude'.
        'latitude'
    ];


}
