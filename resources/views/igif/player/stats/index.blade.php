@extends('layouts.dashboard')
@section('page_heading','Stats Dashboard')
@section('section')


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('partials.fairways-chart')
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>
    </div>

@stop
