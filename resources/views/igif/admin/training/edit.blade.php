@extends('layouts.dashboard')
@section('page_heading','Admin: Edit Drill')
@section('section')

    {{--*/ $media_path = '/training_media/' /*--}}

    <div class="row">


        <div class="col-sm-3">

            <img src="{{$drill->media ? $media_path . $drill->media->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">

            {!! Form::model($drill, ['method'=>'PATCH', 'action'=> ['Training\AdminTrainingController@update', $drill->id],'files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('training_categories_id', 'Training Category:') !!}
                {!! Form::select('training_categories_id', $categories, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Name:') !!}
                {!! Form::textArea('description', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('training_media_id', 'Training Media:') !!}
                {!! Form::file('training_media_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('default_attempts', 'Attempts:') !!}
                {!! Form::text('default_attempts', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('default_distance', 'Distance:') !!}
                {!! Form::text('default_distance', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
            {!! Form::label('training_units_of_length_id', 'Unit of Length:') !!}
            {!! Form::select('training_units_of_length_id', $unitsoflength, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('training_measurement_type_id', 'Measurement Type:') !!}
                {!! Form::select('training_measurement_type_id', $measurementtypes, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Training Drill', ['class'=>'btn btn-primary col-sm-4']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('default_success_criteria', 'Success Criteria:') !!}
                {!! Form::text('default_success_criteria', null, ['class'=>'form-control'])!!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $drill->id]]) !!}


            <div class="form-group">
                {!! Form::submit('Delete Training Drill', ['class'=>'btn btn-danger col-sm-4 pull-right']) !!}
            </div>


            {!! Form::close() !!}


        </div>
    </div>


    <div class="row">

        @include('includes.form_error')

    </div>


@stop
