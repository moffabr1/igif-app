<?php

namespace App\Http\Controllers;

use App\Club;
use App\Course;
use App\Scorecard;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $limit = 10;

    public function index(Request $request)
    {
        //
//        $courses = Course::all();
//        return view('igif.admin.courses.index', compact('courses'));

        $courses = Course::where(function($query) use ($request) {

            if ( ( $term = $request->get("term")) ) {

                $keywords = '%' . $term . '%';
                $query->orWhere("course_name", 'LIKE', $keywords);
//                $query->orWhere("city_name", 'LIKE', $keywords);
//                $query->orWhere("state_province_name", 'LIKE', $keywords);
            }

        })

            ->orderBy('course_name', 'asc')
            ->paginate($this->limit);


        return view('igif.admin.courses.index', compact('courses'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $clubs = Club::lists('club_name','id')->all();


        $clubs = Club::select('id', DB::raw('CONCAT(club_name, " - ", state_province_name) AS club_name_list'))
            ->orderBy('club_name')
            ->lists('club_name_list', 'id')->all();

//        $clubs = Club::orderBy('club_name','asc')->lists('club_name','id')->all();
        return view('igif.admin.courses.create', compact('clubs'));







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
//        $input = $request->all();
//        return $input;

//        $input = $request->all();
//        Course::create($input);

        Course::create($request->all());

        Session::flash('message', 'The Golf Course has been Created');
        Session::flash('message_style', 'bg-success');

        //return $input;
        return redirect('/igif/admin/courses');

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
