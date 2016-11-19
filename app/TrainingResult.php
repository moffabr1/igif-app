<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingResult extends Model
{
    //
    protected $fillable =

        [
            'training_drills_id',
            'training_categories_id',
            'training_date',
            'distance',
            'attempts',
            'success',
        ];


    public function result() {

        return $this->hasOne('App\TrainingDrill');

    }
    public function category() {

        return $this->hasOne('App\TrainingCategory');

    }

}
