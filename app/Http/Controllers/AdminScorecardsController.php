<?php

namespace App\Http\Controllers;

use App\Course;
use App\Scorecard;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminScorecardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $limit = 10;

    public function index()
    {
        //
//
//        $cards = Scorecard::all()->take(10)
//            ->paginate($this->limit);

//        $cards = DB::table('scorecards')
//            ->get([
//                'id',
//                'course_id'
//            ]);

//        $cards = Scorecard::get([
//                'id',
//                'course_id',
//            ])
//            -with('course');

//        $cards = Scorecard::with('course', 'club')->get(['id', 'course_id', 'club_id'])->take(10);


//        $cards = Scorecard::with('clubs', 'courses')
//            ->get(
//                'clubs.id',
//                'clubs.club_name'
//            );



//        $cards = Scorecard::get(['id', 'club_id'])
//            ->where('club_id' == 4)
//            ->get();

//        $cards = DB::table('scorecards')->where('club_id', '=', 4)->get();

//        $cards = DB::table('scorecards')
//            ->get()
//            ->paginate($this->limit);


//        dd($cards);

//        return view('igif.admin.scorecards.index', compact('cards'));


        //$scorecards = Scorecard::all();

        return view('igif.admin.scorecards.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $courses = Course::lists('course_name', 'id')->sort()->all();

//        $courses = $c->sortBy('course_name');
//        $courses->values()->all();


        return view('igif.admin.scorecards.create', compact('courses'));
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

//        return $request->all();

        $input = $request->all();
        Scorecard::create($input);

        return redirect('/igif/admin/scorecards/');
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
