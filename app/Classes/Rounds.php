<?php
/**
 * Created by PhpStorm.
 * User: brianmof
 * Date: 11/3/16
 * Time: 8:10 PM
 */

namespace App\Classes;


use App\Scores;

class Rounds
{

    public static function roundsAll($user, $n)
    {
        // returns all the rounds for a user

        $rounds = Scores::where('user_id', '=', $user)
            ->orderBy('round_date', 'desc')
            ->take($n)
            ->get();
//dd($rounds);
        return $rounds;

    }

    public static function roundById($round_id) {

        // returns a single round by round id (scores.id)

        $round = Scores::with('scorecard.course')->find($round_id);

        return $round;
    }


}