<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingUnitsOfLength extends Model
{
    //

    protected $fillable =

        [
            'name',
            'symbol',
        ];

    protected $table = 'training_units_of_length';
}
