<?php

namespace App\Http\Controllers;

use App\Club;
use App\Course;
use App\Scorecard;
use App\Scores;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PlayerScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->id;

        $scores = Scores::where('user_id', '=', $user)
            ->orderBy('round_date', 'DESC')
            ->paginate(10);

//        $scores = Scores::paginate(10);


        return view('igif.player.scores.index', compact('scores'));

//        return view('igif.player.scores.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $courses = Course::lists('course_name', 'id')->all();

        $states = DB::table('clubs')
            ->select('state_province_name')
            ->groupBy('state_province_name')
            ->get();

        return view('igif.player.scores.create', compact('states', 'courses'));

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
//        $request->user_id = Auth::user()->id; //assigning user_id value to the current logged in user's id (this has to be before adding the request to the inputs variable so when  you execute ::Create($inputs) it will be there)
//        $input = $request->all();

//        return $input;

////        $product = Product::Create($inputs);
////
//        $request->merge([ 'total_score' => '500' ]);
//        echo $request['total_score'];

        //active date piece
//        $round_date = $request['round_date'];
//        Carbon::createFromFormat('Y-m-d', $round_date);
//        $request->merge([ 'round_date' => $round_date]);



//        return $request['round_date'];

        $input = $request->all();
        Scores::create($input);

        Session::flash('message', 'The Score has been Entered');
        Session::flash('message_style', 'bg-success');

        return redirect('/igif/player/scores');
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
