@extends('layouts.dashboard')
@section('page_heading','Admin: Create Training Drills')
@section('section')

    <div class="col-sm-8">
        <div class="row">

            {!! Form::open(['method'=>'POST', 'action'=> 'Training\AdminTrainingController@store','files'=>true]) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('training_categories_id', 'Category:') !!}
                {!! Form::select('training_categories_id', ['' => 'Choose Options'] + $categories, null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('measurement_type', 'Measurement Type:') !!}
                {!! Form::select('measurement_type', array('' => 'Choose Options', 'proximity' => 'Proximity', 'attempts' => 'Attempts'), null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('default_attempts', 'Attempts:') !!}
                {{--{!! Form::text('default_attempts', null, ['class'=>'form-control'])!!}--}}
                {{ Form::selectRange('default_attempts', 10, 20, ['class'=>'form-control'])  }}
            </div>
            <div class="form-group">
                {!! Form::label('default_distance', 'Distance:') !!}
                {{--{!! Form::text('default_attempts', null, ['class'=>'form-control'])!!}--}}
                {{ Form::selectRange('default_distance', 1, 250, ['class'=>'form-control'])  }} {!! Form::select('default_distance_unit', array('' => 'Yards or Feet?', 'yards' => 'Yards', 'feet' => 'Feet'), null, ['class'=>'form-control'])!!}

            </div>
            <div class="form-group">
                {!! Form::label('default_success_criteria', 'Success Criteria:') !!}
                {!! Form::text('default_success_criteria', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('training_media_id', 'File:') !!}
                {!! Form::file('training_media_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Training Drill', ['class'=>'btn btn-primary']) !!}
            </div>

        </div>
    </div>

    {!! Form::close() !!}


    @include('includes.form_error')



@stop
