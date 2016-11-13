@extends('layouts.dashboard')
@section('page_heading','Golf Stats Dashboard')
@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<h3 class="panel-title">Line Chart</h3>--}}
                    {{--</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--<canvas id="cline" width="552" height="346" style="width: 276px; height: 173px;"></canvas>--}}
                    {{--</div>--}}
                {{--</div>--}}
                @include('partials.charts.fairways-chart')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Donut Chart</h3>
                    </div>
                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;"><canvas class="round" id="cdonut" width="492" height="382" style="width: 246px; height: 191px;"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Pie Chart</h3>

                    </div>

                    <div class="panel-body">
                        <div style="max-width:400px; margin:0 auto;"><canvas class="round" id="cpie" width="492" height="392" style="width: 246px; height: 196px;"></canvas></div>
                    </div>
                </div>


                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Bar Chart</h3>

                    </div>

                    <div class="panel-body">
                        <canvas id="cbar" width="552" height="346" style="width: 276px; height: 173px;"></canvas>
                    </div>
                </div>

            </div>
        </div>


    </div>

@stop
