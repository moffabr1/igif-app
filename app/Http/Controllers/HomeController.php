<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Scores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('/igif/home');
        //return view('igif');

        $user = Auth::user();

        //Need to get the chart data and pass it to the home page for the user (Dashboard) to
        //display the charts. Write a function that gets the chart data.





        return view('igif.home', compact('user'));
    }



    public function getPlayerScores($currentUser)
    {
        //for the initial line chart will simply grab their scores and dates
        //$scoreHistory
        //$scoreDateHistory

//        $viewer = View::select(DB::raw("SUM(numberofview) as count"))
//            ->orderBy("created_at")
//            ->groupBy(DB::raw("year(created_at)"))
//            ->get()->toArray();
//        $viewer = array_column($viewer, 'count');

        $playerScores = View::select(DB::raw("total_score"))
            ->orderBy("round_date")
//            ->groupBy(DB::raw("year(created_at)"))
            ->get()->toArray();
        $playerScores = array_column($playerScores);



//        return view('chartjs')
//            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
//            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));
        return $playerScores;
    }

}
