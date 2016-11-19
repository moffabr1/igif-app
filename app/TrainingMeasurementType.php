<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingMeasurementType extends Model
{
    //
    protected $fillable =

        [
            'type',
        ];

    protected $table = 'training_measurement_types';
}
