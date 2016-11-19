<?php

namespace App\Http\Controllers\Training;

use App\TrainingCategory;
use App\TrainingDrill;
use App\TrainingMeasurementType;
use App\TrainingMedia;
use App\TrainingUnitsOfLength;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminTrainingController extends Controller
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
        $drills = TrainingDrill::where(function($query) use ($request) {

            if ( ( $term = $request->get("term")) ) {

                $keywords = '%' . $term . '%';
                $query->orWhere("name", 'LIKE', $keywords);
                $query->orWhere("description", 'LIKE', $keywords);
                $query->orWhere("measurement_type", 'LIKE', $keywords);
            }

        })

            ->orderBy('training_categories_id', 'desc')
            ->paginate($this->limit);

//        $drills = TrainingDrill::all();

//dd($drills);
        return view('igif.admin.training.index', compact('drills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = TrainingCategory::lists('name','id')->all();

        return view('igif.admin.training.create', compact('categories'));
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
            $training_category_id = $input['training_categories_id'];


            if($file = $request->file('training_media_id')) {

                $training_category = TrainingCategory::findOrFail($training_category_id);

                $training_categories_name = $training_category->name;

                $name = $training_categories_name . time() . $file->getClientOriginalName();

                $file->move('training_media', $name);

                $media = TrainingMedia::create(['file' => $name]);

                $input['training_media_id'] = $media->id;


            }

            TrainingDrill::create($input);

            Session::flash('message', 'The User has been Created');
            Session::flash('message_style', 'bg-success');

            return redirect('/igif/admin/training/');

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

        $drill = TrainingDrill::findOrFail($id);

        $categories = TrainingCategory::lists('name', 'id')->all();

        $unitsoflength = TrainingUnitsOfLength::lists('name', 'symbol', 'id')->all();

        $measurementtypes = TrainingMeasurementType::lists('name', 'id')->all();

        return view('igif.admin.training.edit', compact('drill', 'categories', 'unitsoflength', 'measurementtypes'));



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

        dd('test');
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
