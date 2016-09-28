<?php

namespace App\Http\Controllers;

use App\Course;
use App\Scorecard;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminScorecardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cards = Scorecard::all();

        //return $cards;

        return view('igif.admin.scorecards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $roles = Role::lists('name','id')->all();
//        return view('admin.users.create', compact('roles'));

//        return view('igif.admin.scorecards.create');

        $courses = Course::lists('course_name','club_id', 'id')->all();
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
