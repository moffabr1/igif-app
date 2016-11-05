<?php

namespace App\Http\Controllers;

use App\Classes\Proximity;
use App\Classes\Rounds;
use App\Scores;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Classes\Stats;



class PlayerScorecardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = Auth::user()->id;
        $rounds = Rounds::roundsAll($user, null);

        if ( !empty ( $request->scorecard ) ) {
            $round_id = $request->input('scorecard');
        }
        else {
            $round_id = $rounds->first()->id;

        }


            $single_round = Rounds::roundById($round_id);

            $holeresults = Stats::getHoleResults($single_round);

            $roundstats = Stats::getRoundStats($single_round);

            $cumulativeData = Stats::getCumulativeData($user);

            $proximityStatsRound = Proximity::getProximityStatsRound($single_round);
            $cumulativeproximitystats = Proximity::getCumulativeProximityStats($rounds);

            //flash the selected id
            Session::flash('scorecard_id', $round_id);

            return view('igif.player.scorecards.index',
            compact(
                'single_round',
                'rounds',
                'holeresults',
                'roundstats',
                'cumulativeData',
                'proximityStatsRound',
                'cumulativeproximitystats'
            ));
        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
