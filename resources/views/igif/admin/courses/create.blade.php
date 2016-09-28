@extends('layouts.dashboard')
@section('page_heading','Admin: Create Golf Course')
@section('section')

    <div class="row">

        <div class="col-sm-9">

            {!! Form::open(['method'=>'POST', 'action'=> 'AdminCoursesController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('club_id', 'Club Id:') !!}
                {!! Form::select('club_id', [''=>'Choose Golf Club'] + $clubs , null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('course_name', 'Course Name:') !!}
                {!! Form::text('course_name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('holes', 'Number of Holes:') !!}
                {!! Form::text('holes', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('par', 'Course Par:') !!}
                {!! Form::text('par', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Golf Course', ['class'=>'btn btn-primary col-sm-4']) !!}
            </div>


            {!! Form::close() !!}


        </div>
    </div>


    <div class="row">

        @include('includes.form_error')

    </div>


@stop
