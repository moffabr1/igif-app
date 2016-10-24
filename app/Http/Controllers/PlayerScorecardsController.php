<?php

namespace App\Http\Controllers;

use App\Scores;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PlayerScorecardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
//    {
//        if ( !empty ( $request->scorecard ) ) {
//            // $request is not empty
//            // need to get the scores for the score id from Scores model
//            // and also grab the scorecard data for the
//            //scorecard id and then grab the course information from the Courses model
//            // by the id from the Scorecards table.
//
//// Get the scores from the scores table where id = request variable then get the scorecard
////            from the scorecards table where the id = scorecard_id from the scores table and then
////            get the course info from the course table where the course id = course_id from the
////            scorecards table
//
//
//
//
//            $user = Auth::user()->id;
//            $score_id = $request->input('scorecard');
//
//            $playerCard = Scores::with('user', 'scorecard', 'course')
//                ->whereHas('scorecard', function ($query) use ($user) {
//                    $query->where('scores.id', '=', $user);
//                -get();
//
////            $playerCard = Scores::with('scorecard')
////                ->whereHas('course', function($query) use ($user) {
////                    $query->where('score.user_id', '=', $user);
////                })
////                ->get();
//
//            dd($playerCard);
//
////            Product::with('productdetails')
////                ->whereHas('categories', function ($query) use ($submenu_id) {
////                    $query->where('categories.id', '=', $submenu_id);
////                })
//
//
//
//
////            $rounds = Scores::where('user_id', '=', $user)
////                ->orderBy('round_date', 'desc')
////                ->get();
////            $score_id = $request->input('scorecard');
////            $score_data = Scores::where('id', '=', $score_id)
//////                ->orderBy('round_date', 'desc')
////                ->get();
//////            dd($score_data);
////
////            return view('igif.player.scorecards.index', compact('score_data', 'rounds'));
//
//        }
//        else {
//            $user = Auth::user()->id;
//            $rounds = Scores::where('user_id', '=', $user)
//                ->orderBy('round_date', 'desc')
//                ->get();
//            return view('igif.player.scorecards.index', compact('rounds'));
//        }
//
//    }
//
////    public function index()
////    {
////        $user = Auth::user()->id;
////        $rounds = Scores::where('user_id', '=', $user)
////            ->orderBy('round_date', 'desc')
////            ->get();
////        return view('igif.player.scorecards.index', compact('rounds'));
////    }

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
