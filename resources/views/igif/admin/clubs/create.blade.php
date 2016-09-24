@extends('layouts.dashboard')
@section('page_heading','Admin: Create Golf Club')
@section('section')

    <div class="row">

        <div class="col-sm-9">

            {!! Form::open(['method'=>'POST', 'action'=> 'AdminClubsController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('id', 'Club Id:') !!}
                {!! Form::text('id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('club_name', 'Club Name:') !!}
                {!! Form::text('club_name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('number_of_holes', 'Number of Holes:') !!}
                {!! Form::text('number_of_holes', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('address', 'Address:') !!}
                {!! Form::text('address', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('city_name', 'City:') !!}
                {!! Form::text('city_name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('state_province_name', 'State:') !!}
                {!! Form::text('state_province_name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('country_name', 'Country:') !!}
                {!! Form::text('country_name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('postal_code', 'Postal Code:') !!}
                {!! Form::text('postal_code', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('phone_number', 'Phone Number:') !!}
                {!! Form::text('phone_number', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('website', 'Website:') !!}
                {!! Form::text('website', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('longitude', 'Longitude:') !!}
                {!! Form::text('longitude', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('latitude', 'Latitude:') !!}
                {!! Form::text('latitude', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Golf Club', ['class'=>'btn btn-primary col-sm-4']) !!}
            </div>


            {{--{!! Form::close() !!}--}}

            {{--{!! Form::open(['method'=>'DELETE', 'action'=> ['AdminClubsController@destroy', $club->id]]) !!}--}}


            {{--<div class="form-group">--}}
                {{--{!! Form::submit('Create Golf Club', ['class'=>'btn btn-danger col-sm-4 pull-right']) !!}--}}
            {{--</div>--}}


            {!! Form::close() !!}


        </div>
    </div>


    <div class="row">

        @include('includes.form_error')

    </div>


@stop

{{--<div class="form-group">--}}
{{--{!! Form::label('role_id', 'Role:') !!}--}}
{{--{!! Form::select('role_id', $roles, null, ['class'=>'form-control'])!!}--}}
{{--</div>--}}


{{--<div class="form-group">--}}
{{--{!! Form::label('is_active', 'Status:') !!}--}}
{{--{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control'])!!}--}}
{{--</div>--}}
