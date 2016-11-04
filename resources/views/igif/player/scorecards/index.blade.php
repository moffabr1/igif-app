@extends('layouts.dashboard')
@section('page_heading','Scorecards')
@section('section')

<style>
    .red {
    background-color: #f99;
    }
    .yellow {
    background-color: #ff9;
    }
    .green {
    background-color: #9f9;
    }
    .notApplicable {
    background-color: #fff;
    }
    table {

    }
    td {
    text-align: center;
    font-size : 85%;
    }​
     td.status {
         font-size : 77%;
         font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
         /*background : #efe none; color : #630; */
         }
    th {
        text-align: center;
    }
</style>

{{--@if ($var === "hello")--}}
    {{--Hi--}}
{{--@else--}}
    {{--goodbye--}}
{{--@endif--}}

{{--{{ $var === "hello" ? "Hi" : "Goodbye" }}--}}



{!! Form::open(['method'=>'GET', 'action'=> 'PlayerScorecardsController@index', 'id'=> 'scorecards']) !!}

<div class="row">
    <div class="col-md-8">
        <div id="scorecards_div" class="form-group">
            <label>Select a Scorecard</label>

            <select class="form-control input-sm" name="scorecard" id="scorecard" onchange="this.form.submit()">
                <option value="">Select a Scorecard</option>

                {{--@if( ! empty($rounds))--}}

                    @foreach($rounds as $round)

                        <option value="{{$round->id}}" @if (session('scorecard_id') == $round->id) selected="selected" @endif>{{$round->total_score}}   -   {{$round->round_date}} : {{$round->scorecard->course->course_name}} </option>

                    @endforeach

                {{--@foreach ($recommended_foods as $key => $food)--}}
                    {{--<option value="{{ $food}}" {{ (old("recommended_food") == $food ? "selected":"") }}>{{ $food }}</option>--}}
                {{--@endforeach--}}

                {{--@endif--}}
            </select>

        </div>
    </div>
</div>
{!! Form::close() !!}
{{--{{ "User ID" . $rounds->first()->user_id }}--}}
<div class="row">
    <div class="container">
        <div class="col-sm-10">
        <h3 id="card_header">
            {{ isset($round) ? $round->round_date : $rounds->first()->round_date }} : {{ isset($round) ? $round->scorecard->course->course_name :  $rounds->first()->scorecard->course->course_name}}
            {{--{{$round->round_date}} : {{$round->scorecard->course->course_name}}--}}
            {{--{{Carbon\Carbon::parse($round->round_date)->toFormattedDateString()}}--}}
        </h3>
            <table class="table table-sm table-bordered table-responsive" id="scorestable">
                <tbody>
                <tr>
                    <td colspan="11">
                        Front 9
                    </td>
                </tr>
                <tr>
                    <th>
                        Hole
                    </th>
                    <td>
                        1
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        6
                    </td>
                    <td>
                        7
                    </td>
                    <td>
                        8
                    </td>
                    <td>
                        9
                    </td>
                    <td>
                        Out
                    </td>
                </tr>
                <tr class="cardinfo">
                    <th>
                        Par
                    </th>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole1_par : $rounds->first()->scorecard->hole1_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole2_par : $rounds->first()->scorecard->hole2_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole3_par : $rounds->first()->scorecard->hole3_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole4_par : $rounds->first()->scorecard->hole4_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole5_par : $rounds->first()->scorecard->hole5_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole6_par : $rounds->first()->scorecard->hole6_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole7_par : $rounds->first()->scorecard->hole7_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole8_par : $rounds->first()->scorecard->hole8_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($round) ? $round->scorecard->hole9_par : $rounds->first()->scorecard->hole9_par }}
                    </td>
                    <td class="front9_out_pars">

                    </td>
                </tr>
                <tr class="cardinfo">
                    <th>
                        Score
                    </th>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole1_score : $rounds->first()->hole1_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole2_score : $rounds->first()->hole2_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole3_score : $rounds->first()->hole3_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole4_score : $rounds->first()->hole4_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole5_score : $rounds->first()->hole5_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole6_score : $rounds->first()->hole6_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole7_score : $rounds->first()->hole7_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole8_score : $rounds->first()->hole8_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($round) ? $round->hole9_score : $rounds->first()->hole9_score }}
                    </td>
                    <td class="front9_out_scores">

                    </td>
                </tr>
                <tr class="cardinfo">
                    <th>
                        Status
                    </th>
                    <td class="status">

                    </td>
                    <td class="status">

                    </td>
                    <td class="status">

                    </td>
                    <td class="status">

                    </td>
                    <td class="status">

                    </td>
                    <td class="status">

                    </td>
                    <td class="status">

                    </td>
                    <td class="status">

                    </td>
                    <td class="status">

                    </td>
                    <td class="out_status">

                    </td>
                </tr>
{{-- START Back 9 Rows--}}

@if($round->round_type == 18)
                <tr id="{{$round->round_type}}" class="back9rows">
                    <td colspan="11">
                        Back 9
                    </td>
                </tr>
                <tr>
                    <th>
                        Hole
                    </th>
                    <td>
                        10
                    </td>
                    <td>
                        11
                    </td>
                    <td>
                        12
                    </td>
                    <td>
                        13
                    </td>
                    <td>
                        14
                    </td>
                    <td>
                        15
                    </td>
                    <td>
                        16
                    </td>
                    <td>
                        17
                    </td>
                    <td>
                        18
                    </td>
                    <td>
                        In
                    </td>
                </tr>
                <tr class="cardinfo">
                    <th>
                        Par
                    </th>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole10_par : $rounds->first()->scorecard->hole10_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole11_par : $rounds->first()->scorecard->hole11_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole12_par : $rounds->first()->scorecard->hole12_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole13_par : $rounds->first()->scorecard->hole13_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole14_par : $rounds->first()->scorecard->hole14_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole15_par : $rounds->first()->scorecard->hole15_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole16_par : $rounds->first()->scorecard->hole16_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole17_par : $rounds->first()->scorecard->hole17_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($round) ? $round->scorecard->hole18_par : $rounds->first()->scorecard->hole18_par }}
                    </td>
                    <td class="back9_out_pars">

                    </td>
                </tr>
                <tr class="cardinfo">
                    <th>
                        Score
                    </th>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole10_score : $rounds->first()->hole10_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole11_score : $rounds->first()->hole11_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole12_score : $rounds->first()->hole12_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole13_score : $rounds->first()->hole13_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole14_score : $rounds->first()->hole14_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole15_score : $rounds->first()->hole15_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole16_score : $rounds->first()->hole16_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole17_score : $rounds->first()->hole17_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($round) ? $round->hole18_score : $rounds->first()->hole18_score }}
                    </td>
                    <td class="back9_out_scores">

                    </td>
                </tr>
                <tr class="cardinfo">
                    <th>
                        Status
                    </th>
                    <td class="back9status">

                    </td>
                    <td class="back9status">

                    </td>
                    <td class="back9status">

                    </td>
                    <td class="back9status">

                    </td>
                    <td class="back9status">

                    </td>
                    <td class="back9status">

                    </td>
                    <td class="back9status">

                    </td>
                    <td class="back9status">

                    </td>
                    <td class="back9status">

                    </td>
                    <td class="back9_out_status">

                    </td>
                </tr>
{{--END Back 9 Rows--}}
@endif
                <tr class="legend_row">
                    <td class="legend_cell" colspan="11">
                        Legend
                    </td>
                </tr>
                </tbody>
            </table>

 Round Stats Table
            <table class="table table-sm table-striped table-bordered table-responsive" id="statstable">
                <thead>
                <tr>
                    <th>Stat Category</th>
                    <th>Round Stats</th>
                    <th>Historical Stats</th>
                    <th>Trend</th>
                    <th>Stats</th>
                </tr>
                </thead>
                <tbody>
{{--{!! html_entity_decode( HTML::link("#", HTML::image("img/logo.png", "Logo") ) ) !!}--}}
                <tr>
                    <th>Eagles</th>
                    <td>{{ $holeresults['eagles'] }}</td>
                    <td>{{ number_format($cumulativeData['total_eagles_round'], 2)}} ({{$cumulativeData['total_eagles']}}/{{$cumulativeData['total_rounds']}}) </td>
                    {{--<td>@if($holeresults['eagles'] < $cumulativeData['total_eagles_round']){!! Html::image('app_images/trend_down_arrow.png') !!}@elseif ($holeresults['eagles'] > $cumulativeData['total_eagles_round']){!! Html::image('app_images/trend_up_arrow.png') !!} @elseif ($holeresults['eagles'] = $cumulativeData['total_eagles_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>--}}
                    {{--<td>@if($holeresults['eagles'] < $cumulativeData['total_eagles_round'])<a href="{{ route('scoring',['data'=>$cumulativeData['total_eagles_round']] ) }}"><img src="/app_images/trend_down_arrow.png"></a>@elseif ($holeresults['eagles'] > $cumulativeData['total_eagles_round'])<a href="{{ route('scoring',['data'=>$cumulativeData['total_eagles_round']] ) }}"><img src="/app_images/trend_up_arrow.png"></a> @elseif ($holeresults['eagles'] = $cumulativeData['total_eagles_round'])<a href="{{ route('scoring',['data'=>$cumulativeData['total_rounds']] ) }}"><img src="/app_images/trend_even_dash.png"></a>@endif</td>--}}
                    <td>@if($holeresults['eagles'] < $cumulativeData['total_eagles_round'])<a href="{{ route('scoring') }}"><img src="/app_images/trend_down_arrow.png"></a>@elseif ($holeresults['eagles'] > $cumulativeData['total_eagles_round'])<a href="{{ route('scoring') }}"><img src="/app_images/trend_up_arrow.png"></a> @elseif ($holeresults['eagles'] = $cumulativeData['total_eagles_round'])<a href="{{ route('scoring') }}"><img src="/app_images/trend_even_dash.png"></a>@endif</td>
                    {{--route('remindHelper',['event'=>$eventId,'user'=>$userId])--}}
                    <td><a href="{{ route('scoring') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <th>Birdies</th>
                    <td>{{ $holeresults['birdies'] }}</td>
                    <td>{{ number_format($cumulativeData['total_birdies_round'], 2)}} ({{$cumulativeData['total_birdies']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($holeresults['birdies'] < $cumulativeData['total_birdies_round']){!! Html::image('app_images/trend_down_arrow.png') !!}@elseif ($holeresults['birdies'] > $cumulativeData['total_birdies_round']){!! Html::image('app_images/trend_up_arrow.png') !!} @elseif ($holeresults['birdies'] = $cumulativeData['total_birdies_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                    <td><a href="{{ route('scoring') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <th>Pars</th>
                    <td>{{ $holeresults['pars'] }}</td>
                    <td>{{ number_format($cumulativeData['total_pars_round'], 2)}} ({{$cumulativeData['total_pars']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($holeresults['pars'] < $cumulativeData['total_pars_round']){!! Html::image('app_images/trend_down_arrow.png') !!}@elseif ($holeresults['pars'] > $cumulativeData['total_pars_round']){!! Html::image('app_images/trend_up_arrow.png') !!} @elseif ($holeresults['pars'] = $cumulativeData['total_pars_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                    <td><a href="{{ route('scoring') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                <tr>
                    <th>Bogeys</th>
                    <td>{{ $holeresults['bogeys'] }}</td>
                    <td>{{ number_format($cumulativeData['total_bogeys_round'], 2)}} ({{$cumulativeData['total_bogeys']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($holeresults['bogeys'] < $cumulativeData['total_bogeys_round']){!! Html::image('app_images/trend_down_arrow_green.png') !!}@elseif ($holeresults['bogeys'] > $cumulativeData['total_bogeys_round']){!! Html::image('app_images/trend_up_arrow_red.png') !!} @elseif ($holeresults['bogeys'] = $cumulativeData['total_bogeys_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                    <td><a href="{{ route('scoring') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <th>Dbl Bogeys</th>
                    <td>{{ $holeresults['dblbogeys'] }}</td>
                    <td>{{ number_format($cumulativeData['total_dblbogeys_round'], 2)}} ({{$cumulativeData['total_dblbogeys']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($holeresults['dblbogeys'] < $cumulativeData['total_dblbogeys_round']){!! Html::image('app_images/trend_down_arrow_green.png') !!}@elseif ($holeresults['dblbogeys'] > $cumulativeData['total_dblbogeys_round']){!! Html::image('app_images/trend_up_arrow_red.png') !!} @elseif ($holeresults['dblbogeys'] = $cumulativeData['total_dblbogeys_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                    <td><a href="{{ route('scoring') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <th>3+ Bogeys</th>
                    <td>{{ $holeresults['tripleplusbogeys'] }}</td>
                    <td>{{ number_format($cumulativeData['total_3plusbogeys_round'], 2)}} ({{$cumulativeData['total_3plusbogeys']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($holeresults['tripleplusbogeys'] < $cumulativeData['total_3plusbogeys_round']){!! Html::image('app_images/trend_down_arrow_green.png') !!}@elseif ($holeresults['tripleplusbogeys'] > $cumulativeData['total_3plusbogeys_round']){!! Html::image('app_images/trend_up_arrow_red.png') !!} @elseif ($holeresults['tripleplusbogeys'] = $cumulativeData['total_3plusbogeys_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                    <td><a href="{{ route('scoring') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <th>Driving Accuracy</th>
                    <td>{{ number_format($roundstats['fwpercentage'], 2) * 100 . '%' }} &nbsp;&nbsp;({{$roundstats['fairways']}}/{{$roundstats['drivingholes']}})</td>
                    <td>{{ number_format($cumulativeData['total_fw_percentage'], 2) * 100 . '%' }}  ({{$cumulativeData['total_fw_hit']}}/{{$cumulativeData['total_fw']}})</td>
                    <td>@if($roundstats['fwpercentage'] < $cumulativeData['total_fw_percentage']){!! Html::image('app_images/trend_down_arrow.png') !!}@elseif ($roundstats['fwpercentage'] > $cumulativeData['total_fw_percentage']){!! Html::image('app_images/trend_up_arrow.png') !!} @endif</td>
                    <td><a href="{{ route('fairways') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <th>Greens in Regulation (GIR)</th>
                    <td>{{ $roundstats['greens'] }}</td>
                    <td>{{ number_format($cumulativeData['total_gir_round'], 2)}} ({{$cumulativeData['total_gir_hit']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($roundstats['greens'] < $cumulativeData['total_gir_round']){!! Html::image('app_images/trend_down_arrow.png') !!}@elseif ($roundstats['greens'] > $cumulativeData['total_gir_round']){!! Html::image('app_images/trend_up_arrow.png') !!} @elseif ($roundstats['greens'] = $cumulativeData['total_gir_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                    <td><a href="{{ route('gir') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <th>GIR %</th>
                    <td>{{ number_format($roundstats['girpercentage'], 2) * 100 . '%' }} &nbsp;&nbsp;({{$roundstats['greens']}}/{{$round->round_type }})</td>
                    <td>{{ number_format($cumulativeData['total_gir_percentage'], 2) * 100 . '%' }}  ({{$cumulativeData['total_gir_hit']}}/{{$cumulativeData['total_gir']}})</td>
                    <td>@if($roundstats['girpercentage'] < $cumulativeData['total_gir_percentage']){{ Html::image('app_images/trend_down_arrow.png') }}@elseif ($roundstats['girpercentage'] > $cumulativeData['total_gir_percentage']){{ Html::image('app_images/trend_up_arrow.png') }} @elseif ($roundstats['girpercentage'] = $cumulativeData['total_gir_percentage']){{ Html::image('app_images/trend_even_dash.png') }}@endif</td>
                    <td><a href="{{ route('gir') }}"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <th>Number of Putts</th>
                    <td>{{ $roundstats['putts'] }}</td>
                    <td>{{ number_format($cumulativeData['total_putts_round'], 2)}} ({{$cumulativeData['total_putts']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($roundstats['putts'] > $cumulativeData['total_putts_round']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($roundstats['putts'] < $cumulativeData['total_putts_round']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($roundstats['putts'] = $cumulativeData['total_putts_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>3 Putts</th>
                    <td>{{ $roundstats['threeputts'] }}</td>
                    <td>{{ number_format($cumulativeData['total_threeputts_round'], 2) }} ({{$cumulativeData['total_threeputts']}}/{{$cumulativeData['total_rounds']}})</td>
                    <td>@if($roundstats['threeputts'] > $cumulativeData['total_threeputts_round']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($roundstats['threeputts'] < $cumulativeData['total_threeputts_round']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($roundstats['threeputts'] = $cumulativeData['total_threeputts_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>

                <tr>
                    <th>Putts per Hole</th>
                    <td>{{ number_format($roundstats['puttsperhole'], 2) }}</td>
                    <td>{{ number_format($cumulativeData['total_putts_hole'], 2) }} ({{$cumulativeData['total_putts']}}/{{$cumulativeData['total_holes']}})</td>
                    <td>@if($roundstats['puttsperhole'] > $cumulativeData['total_putts_hole']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($roundstats['puttsperhole'] < $cumulativeData['total_putts_hole']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($roundstats['puttsperhole'] = $cumulativeData['total_putts_hole']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>Putts per GIR</th>
                    <td>{{ number_format($roundstats['puttspergir'], 2) }}</td>
                    <td>{{ number_format($cumulativeData['total_putts_gir'], 2) }} ({{$cumulativeData['total_putts']}}/{{$cumulativeData['total_gir_hit']}})</td>
                    <td>@if($roundstats['puttspergir'] > $cumulativeData['total_putts_gir']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($roundstats['puttspergir'] < $cumulativeData['total_putts_gir']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($roundstats['puttspergir'] = $cumulativeData['total_putts_gir']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>                </tr>
                </tr>
                <tr>
                    <th>Number of Chips</th>
                    <td>{{ $roundstats['chips'] }}</td>
                    <td>{{ number_format($cumulativeData['total_chips_round'], 2)}} ({{$cumulativeData['total_chips']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($roundstats['chips'] > $cumulativeData['total_chips_round']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($roundstats['chips'] < $cumulativeData['total_chips_round']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($roundstats['chips'] = $cumulativeData['total_chips_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>                </tr>
                </tr>
                <tr>
                    <th>2 Chips</th>
                    <td>{{ $roundstats['twochips'] }}</td>
                    <td>{{ number_format($cumulativeData['total_two_chips_round'], 2)}} ({{$cumulativeData['total_two_chips']}}/{{$cumulativeData['total_rounds']}}) </td>
                    <td>@if($roundstats['twochips'] > $cumulativeData['total_two_chips_round']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($roundstats['twochips'] < $cumulativeData['total_two_chips_round']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($roundstats['twochips'] = $cumulativeData['total_two_chips_round']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>                </tr>
                </tr>
                <tr>
                    <th>Sand Saves</th>
                    <td>{{ $roundstats['sandsaves'] }}</td>
                    <td>{{ number_format($cumulativeData['total_sand_saves_percentage'], 2) * 100 . '%' }}  ({{$cumulativeData['total_sand_saves']}}/{{$cumulativeData['total_sand']}})</td>
                    <td></td>
                </tr>
                <tr class="proximitystats_row">
                    <th colspan="11">
                        Proximity to the Hole Stats
                    </th>
                </tr>
                <tr>
                    <th>200+ Yards</th>
                    <td>{{ ($proximityStatsRound['prox_200yds'] == 'No Data' ? $proximityStatsRound['prox_200yds'] : number_format($proximityStatsRound['prox_200yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_200yds'] == 'No Data' ? $cumulativeproximitystats['prox_200yds'] : number_format($cumulativeproximitystats['prox_200yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_200yds'] == 'No Data' || $cumulativeproximitystats['prox_200yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif($proximityStatsRound['prox_200yds'] > $cumulativeproximitystats['prox_200yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_200yds'] < $cumulativeproximitystats['prox_200yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_200yds'] = $cumulativeproximitystats['prox_200yds']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>175-200 Yards</th>
                    <td>{{ ($proximityStatsRound['prox_175_200yds'] == 'No Data' ? $proximityStatsRound['prox_175_200yds'] : number_format($proximityStatsRound['prox_175_200yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_175_200yds'] == 'No Data' ? $cumulativeproximitystats['prox_175_200yds'] : number_format($cumulativeproximitystats['prox_175_200yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_175_200yds'] == 'No Data' || $cumulativeproximitystats['prox_175_200yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif($proximityStatsRound['prox_175_200yds'] > $cumulativeproximitystats['prox_175_200yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_175_200yds'] < $cumulativeproximitystats['prox_175_200yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_175_200yds'] = $cumulativeproximitystats['prox_175_200yds']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>150-175 Yards</th>
                    <td>{{ ($proximityStatsRound['prox_150_175yds'] == 'No Data' ? $proximityStatsRound['prox_150_175yds'] : number_format($proximityStatsRound['prox_150_175yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_150_175yds'] == 'No Data' ? $cumulativeproximitystats['prox_150_175yds'] : number_format($cumulativeproximitystats['prox_150_175yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_150_175yds'] == 'No Data' || $cumulativeproximitystats['prox_150_175yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif($proximityStatsRound['prox_150_175yds'] > $cumulativeproximitystats['prox_150_175yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_150_175yds'] < $cumulativeproximitystats['prox_150_175yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_150_175yds'] = $cumulativeproximitystats['prox_150_175yds']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>130-150 Yards</th>
                    <td>{{ ($proximityStatsRound['prox_130_150yds'] == 'No Data' ? $proximityStatsRound['prox_130_150yds'] : number_format($proximityStatsRound['prox_130_150yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_130_150yds'] == 'No Data' ? $cumulativeproximitystats['prox_130_150yds'] : number_format($cumulativeproximitystats['prox_130_150yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_130_150yds'] == 'No Data' || $cumulativeproximitystats['prox_130_150yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif($proximityStatsRound['prox_130_150yds'] > $cumulativeproximitystats['prox_130_150yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_130_150yds'] < $cumulativeproximitystats['prox_130_150yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_130_150yds'] = $cumulativeproximitystats['prox_130_150yds']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>120-130 Yards</th>
                    <td>{{ ($proximityStatsRound['prox_120_130yds'] == 'No Data' ? $proximityStatsRound['prox_120_130yds'] : number_format($proximityStatsRound['prox_120_130yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_120_130yds'] == 'No Data' ? $cumulativeproximitystats['prox_120_130yds'] : number_format($cumulativeproximitystats['prox_120_130yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_120_130yds'] == 'No Data' || $cumulativeproximitystats['prox_120_130yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif($proximityStatsRound['prox_120_130yds'] > $cumulativeproximitystats['prox_120_130yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_120_130yds'] < $cumulativeproximitystats['prox_120_130yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_120_130yds'] = $cumulativeproximitystats['prox_120_130yds']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>110-120 Yards</th>
                    <td>{{ ($proximityStatsRound['prox_110_120yds'] == 'No Data' ? $proximityStatsRound['prox_110_120yds'] : number_format($proximityStatsRound['prox_110_120yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_110_120yds'] == 'No Data' ? $cumulativeproximitystats['prox_110_120yds'] : number_format($cumulativeproximitystats['prox_110_120yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_110_120yds'] == 'No Data' || $cumulativeproximitystats['prox_110_120yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif($proximityStatsRound['prox_110_120yds'] > $cumulativeproximitystats['prox_110_120yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_110_120yds'] < $cumulativeproximitystats['prox_110_120yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_110_120yds'] = $cumulativeproximitystats['prox_110_120yds']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>100-110 Yards</th>
                    <td>{{ ($proximityStatsRound['prox_100_110yds'] == 'No Data' ? $proximityStatsRound['prox_100_110yds'] : number_format($proximityStatsRound['prox_100_110yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_100_110yds'] == 'No Data' ? $cumulativeproximitystats['prox_100_110yds'] : number_format($cumulativeproximitystats['prox_100_110yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_100_110yds'] == 'No Data' || $cumulativeproximitystats['prox_100_110yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif($proximityStatsRound['prox_100_110yds'] > $cumulativeproximitystats['prox_100_110yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_100_110yds'] < $cumulativeproximitystats['prox_100_110yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_100_110yds'] = $cumulativeproximitystats['prox_100_110yds']){!! Html::image('app_images/trend_even_dash.png') !!}@endif</td>
                </tr>
                <tr>
                    <th>90-100 Yards</th>
                    <td>{{ ($proximityStatsRound['prox_90_100yds'] == 'No Data' ? $proximityStatsRound['prox_90_100yds'] : number_format($proximityStatsRound['prox_90_100yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_90_100yds'] == 'No Data' ? $cumulativeproximitystats['prox_90_100yds'] : number_format($cumulativeproximitystats['prox_90_100yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_90_100yds'] == 'No Data' || $cumulativeproximitystats['prox_90_100yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif ($proximityStatsRound['prox_90_100yds'] > $cumulativeproximitystats['prox_90_100yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_90_100yds'] < $cumulativeproximitystats['prox_90_100yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_90_100yds'] == $cumulativeproximitystats['prox_90_100yds']){!! Html::image('app_images/trend_even_dash.png') !!} @endif</td>
                </tr>
                <tr>
                    <th>Inside 90 Yards</th>
                    <td>{{ ($proximityStatsRound['prox_inside_90yds'] == 'No Data' ? $proximityStatsRound['prox_inside_90yds'] : number_format($proximityStatsRound['prox_inside_90yds'], 0) . "'") }}</td>
                    <td>{{ ($cumulativeproximitystats['prox_inside_90yds'] == 'No Data' ? $cumulativeproximitystats['prox_inside_90yds'] : number_format($cumulativeproximitystats['prox_inside_90yds'], 0) . "'") }}</td>
                    <td>@if($proximityStatsRound['prox_inside_90yds'] == 'No Data' || $cumulativeproximitystats['prox_inside_90yds'] == 'No Data'){!! Html::image('app_images/trend_even_dash.png') !!} @elseif ($proximityStatsRound['prox_inside_90yds'] > $cumulativeproximitystats['prox_inside_90yds']){!! Html::image('app_images/trend_up_arrow_red.png') !!}@elseif ($proximityStatsRound['prox_inside_90yds'] < $cumulativeproximitystats['prox_inside_90yds']){!! Html::image('app_images/trend_down_arrow_green.png') !!} @elseif ($proximityStatsRound['prox_inside_90yds'] == $cumulativeproximitystats['prox_inside_90yds']){!! Html::image('app_images/trend_even_dash.png') !!} @endif</td>
                </tr>
                </tbody>
            </table>

    </div>
</div>
</div>
<script>

//    $('#templateSite tr.highlight').attr('id').val()
    var round_type = $('#scorestable tr.back9rows').attr('id');
if(round_type == 9){
    $('.back9rows').hide();
}
//    alert(round_type);

    var sum = 0;
    $('.front9_pars').each(function() {
        sum += parseFloat($(this).text());
    });
    $('.front9_out_pars').html(sum)

    var sum = 0;
    $('.front9_scores').each(function() {
        sum += parseFloat($(this).text());
    });
    $('.front9_out_scores').html(sum)

if(round_type == 18) {
    var sum = 0;
    $('.back9_pars').each(function() {
        sum += parseFloat($(this).text());
    });
    $('.back9_out_pars').html(sum)

    var sum = 0;
    $('.back9_scores').each(function() {
        sum += parseFloat($(this).text());
    });
    $('.back9_out_scores').html(sum)
}




    $("#scorestable tbody tr.cardinfo").each(function () {
        var i=0;
        $(this).find('td.front9_pars').each(function (index) {
            var currentCell = $(this);
            var nextCell = $(this).closest('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').find('td').eq(i) : null;

            var statusCell = $(this).closest('tr').next('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').next('tr').find('td').eq(i) : null;

if(round_type == 18){
            var back9parsCell = $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i) : null;

            var back9scoresCell = $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i) : null;

            var back9statusCell = $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i) : null;
}

//            alert(back9statusCell.attr('class'));

            var status = nextCell.text() - currentCell.text();
if(round_type == 18) {
            var back9status = back9scoresCell.text() - back9parsCell.text();
}

                if ( status == -3 ) {
                    statusCell.css('backgroundColor', 'chartreuse');
//                    statusCell.append().text(status);
                    statusCell.append().text('Dbl Eagle');
//                    back9statusCell.css('backgroundColor', 'chartreuse');
//                    back9statusCell.append().text(back9status);

                }
                else if ( status == -2) {
                    statusCell.css('backgroundColor', 'aqua');
//                    statusCell.append().text(status);
                    statusCell.append().text('Eagle');
                }
                else if ( status == -1) {
                    statusCell.css('backgroundColor', 'paleturquoise');
//                    statusCell.append().text(status);
                    statusCell.append().text('Birdie');
                }
                else if ( status == 0) {
                    statusCell.css('backgroundColor', 'lightgray');
//                    statusCell.append().text(status);
                    statusCell.append().text('Par');
                }
                else if ( status == 1) {
                    statusCell.css('backgroundColor', 'sandybrown');
//                    statusCell.append().text(status);
                    statusCell.append().text('Bogey');
                }
                else if ( status == 2) {
                    statusCell.css('backgroundColor', 'tomato');
                    statusCell.append().text('Dbl Bogey');
                }
                else if ( status >= 3) {
                    statusCell.css('backgroundColor', 'violet');
                    statusCell.append().text('3+ Bogey');
                }
if(round_type == 18){


                if ( back9status == -3 ) {
                    back9statusCell.css('backgroundColor', 'chartreuse');
                    back9statusCell.append().text('Dbl Eagle');
                }
                else if ( back9status == -2) {
                    back9statusCell.css('backgroundColor', 'aqua');
                    back9statusCell.append().text('Eagle');
                }
                else if ( back9status == -1) {
                    back9statusCell.css('backgroundColor', 'paleturquoise');
                    back9statusCell.append().text('Birdie');
                }
                else if ( back9status == 0) {
                    back9statusCell.css('backgroundColor', 'lightgray');
                    back9statusCell.append().text('Par');
                }
                else if ( back9status == 1) {
                    back9statusCell.css('backgroundColor', 'sandybrown');
                    back9statusCell.append().text('Bogey');
                }
                else if ( back9status == 2) {
                    back9statusCell.css('backgroundColor', 'tomato');
                    back9statusCell.append().text('Dbl Bogey');
                }
                else if ( back9status >= 3) {
                    back9statusCell.css('backgroundColor', 'violet');
                    back9statusCell.append().text('3+ Bogey');
                }

}
            i=i+1;
        });
    });







//        $("#scorestable tbody tr.cardinfo").each(function () {
//            var i=0;
//            $(this).find('td').each(function (index) {
//                var currentCell = $(this);
//                var nextCell = $(this).closest('tr').next('tr').find('td').eq(i).length > 0
//                        ? $(this).closest('tr').next('tr').find('td').eq(i) : null;
////
////                var statusCell = $(this).closest('tr').next('tr').find('td').eq(i).length > 0
////                        ? $(this).closest('tr').next('tr').find('td').eq(i) : null;
////
////                var status = nextCell.text() - currentCell.text();
//
//                //alert(status);
//
////                if ( status = 0 ) {
////                    statusCell.css('backgroundColor', 'yellow');
////                }
//
//                if ( currentCell.text() !== nextCell.text()) {
//                    currentCell.css('backgroundColor', 'yellow');
//                }
//                i=i+1;
//            });
//        });



    //var diff = Number($(".field-content:first").text()) - Number($(".field-content:last").text());

//    $("#scorestable tbody tr.pars").each(function () {
//        var i=0;
//        $(this).find('td').each(function (index) {
//            var currentCell = $(this);
//            var nextCell = $(this).closest('tr').next('tr').find('td').eq(i).length > 0
//                    ? $(this).closest('tr').next('tr').find('td').eq(i) : null;
//            if ( currentCell.text() !== nextCell.text()) {
//                currentCell.css('backgroundColor', 'yellow');
//            }
//            i=i+1;
//        });
//    });







//    $(document).ready(function () {
//        //iterate through each row in the table
//        $('tr').each(function () {
//            //the value of sum needs to be reset for each row, so it has to be set inside the row loop
//            var sum = 0
//            //find the combat elements in the current row and sum it
//            $(this).find('#front9_pars').each(function () {
////                var front9_pars = $(this).text();
//                var front9_pars = $(this).text();
//                if (!isNaN(front9_pars) && front9_pars.length !== 0) {
//
//                    sum += parseInt(front9_pars);
//
//                }
//            });
//            //set the value of currents rows sum to the total-combat element in the current row
//            $('#out_pars', this).html(sum);
//        });
//    });
</script>

@stop