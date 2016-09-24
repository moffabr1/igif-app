<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $clubs = Club::all();

        return view('igif.admin.clubs.index', compact('clubs'));


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
//        return view('igif.admin.users.create', compact('roles'));

        return view('igif.admin.clubs.create');
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

        $input = $request->all();

        Club::create($input);

        Session::flash('message', 'The Golf Club has been Created');
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
        $club = Club::findOrFail($id);

        //$roles = Role::lists('name', 'id')->all();

        return view('igif.admin.clubs.edit', compact('club'));
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

        $input = $request->all();

        $club = Club::findOrFail($id);

        $club->update($input);

        return redirect('/igif/admin/clubs');


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
