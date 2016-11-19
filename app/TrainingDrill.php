<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingDrill extends Model
{
    //
    protected $fillable =

        [
            'training_categories_id',
            'training_media_id',
            'name',
            'description',
            'default_attempts',
            'default_distance',
            'default_success_criteria',
            'measurement_type',
        ];

    public $incrementing = true;

//    protected $table = 'training_drill';

    public function category() {

        return $this->belongsTo('App\TrainingCategory', 'training_categories_id');

    }
    public function media() {

        return $this->belongsTo('App\TrainingMedia', 'training_media_id');

    }

    public function unitsoflength() {

        return $this->belongsTo('App\TrainingUnitsOfLength', 'training_units_of_length_id');

    }

    public function measurementtype() {

        return $this->belongsTo('App\TrainingMeasurementType', 'training_measurement_type_id');

    }
}
