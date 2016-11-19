<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingMedia extends Model
{
    //
    protected $fillable =

        [
            'file',
        ];

    protected $table = 'training_media';


    public function drill() {

        return $this->belongsTo('App\TrainingDrill');

    }

}
