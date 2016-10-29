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
            {{ isset($score) ? $score->round_date : $rounds->first()->round_date }} : {{ isset($score) ? $score->scorecard->course->course_name :  $rounds->first()->scorecard->course->course_name}}
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
                        {{ isset($score) ? $score->scorecard->hole1_par : $rounds->first()->scorecard->hole1_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($score) ? $score->scorecard->hole2_par : $rounds->first()->scorecard->hole2_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($score) ? $score->scorecard->hole3_par : $rounds->first()->scorecard->hole3_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($score) ? $score->scorecard->hole4_par : $rounds->first()->scorecard->hole4_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($score) ? $score->scorecard->hole5_par : $rounds->first()->scorecard->hole5_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($score) ? $score->scorecard->hole6_par : $rounds->first()->scorecard->hole6_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($score) ? $score->scorecard->hole7_par : $rounds->first()->scorecard->hole7_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($score) ? $score->scorecard->hole8_par : $rounds->first()->scorecard->hole8_par }}
                    </td>
                    <td class="front9_pars">
                        {{ isset($score) ? $score->scorecard->hole9_par : $rounds->first()->scorecard->hole9_par }}
                    </td>
                    <td class="front9_out_pars">

                    </td>
                </tr>
                <tr class="cardinfo">
                    <th>
                        Score
                    </th>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole1_score : $rounds->first()->hole1_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole2_score : $rounds->first()->hole2_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole3_score : $rounds->first()->hole3_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole4_score : $rounds->first()->hole4_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole5_score : $rounds->first()->hole5_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole6_score : $rounds->first()->hole6_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole7_score : $rounds->first()->hole7_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole8_score : $rounds->first()->hole8_score }}
                    </td>
                    <td class="front9_scores">
                        {{ isset($score) ? $score->hole9_score : $rounds->first()->hole9_score }}
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

@if($score->round_type == 18)
                <tr>
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
                        {{ isset($score) ? $score->scorecard->hole10_par : $rounds->first()->scorecard->hole10_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($score) ? $score->scorecard->hole11_par : $rounds->first()->scorecard->hole11_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($score) ? $score->scorecard->hole12_par : $rounds->first()->scorecard->hole12_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($score) ? $score->scorecard->hole13_par : $rounds->first()->scorecard->hole13_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($score) ? $score->scorecard->hole14_par : $rounds->first()->scorecard->hole14_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($score) ? $score->scorecard->hole15_par : $rounds->first()->scorecard->hole15_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($score) ? $score->scorecard->hole16_par : $rounds->first()->scorecard->hole16_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($score) ? $score->scorecard->hole17_par : $rounds->first()->scorecard->hole17_par }}
                    </td>
                    <td class="back9_pars">
                        {{ isset($score) ? $score->scorecard->hole18_par : $rounds->first()->scorecard->hole18_par }}
                    </td>
                    <td class="back9_out_pars">

                    </td>
                </tr>
                <tr class="cardinfo">
                    <th>
                        Score
                    </th>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole10_score : $rounds->first()->hole10_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole11_score : $rounds->first()->hole11_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole12_score : $rounds->first()->hole12_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole13_score : $rounds->first()->hole13_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole14_score : $rounds->first()->hole14_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole15_score : $rounds->first()->hole15_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole16_score : $rounds->first()->hole16_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole17_score : $rounds->first()->hole17_score }}
                    </td>
                    <td class="back9_scores">
                        {{ isset($score) ? $score->hole18_score : $rounds->first()->hole18_score }}
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
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Eagles</th>
                    <td>{{ $holeresults['eagles'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Birdies</th>
                    <td>{{ $holeresults['birdies'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Pars</th>
                    <td>{{ $holeresults['pars'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Bogeys</th>
                    <td>{{ $holeresults['bogeys'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Dbl Bogeys</th>
                    <td>{{ $holeresults['dblbogeys'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>3+ Bogeys</th>
                    <td>{{ $holeresults['tripleplusbogeys'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Driving Accuracy</th>
                    <td>{{ number_format($roundstats['fwpercentage'], 2) * 100 . '%' }} &nbsp;&nbsp;({{$roundstats['fairways']}}/{{$roundstats['drivingholes']}})</td>
                    <td>{{ number_format($cumulativeData['total_fw_percentage'], 2) * 100 . '%' }}  ({{$cumulativeData['total_fw_hit']}}/{{$cumulativeData['total_fw']}})</td>
                    <td>@if($roundstats['fwpercentage'] < $cumulativeData['total_fw_percentage']){!! Html::image('app_images/trend_down_arrow.png') !!}@elseif ($roundstats['fwpercentage'] > $cumulativeData['total_fw_percentage']){!! Html::image('app_images/trend_up_arrow.png') !!} @endif</td>
                </tr>
                <tr>
                    <th>Greens in Regulation (GIR)</th>
                    <td>{{ $roundstats['greens'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Number of Putts</th>
                    <td>{{ $roundstats['putts'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Sand Saves</th>
                    <td>{{ $roundstats['sandsaves'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>GIR %</th>
                    <td>{{ number_format($roundstats['girpercentage'], 2) * 100 . '%' }} &nbsp;&nbsp;({{$roundstats['greens']}}/18)</td>
                    <td>{{ number_format($cumulativeData['total_gir_percentage'], 2) * 100 . '%' }}  ({{$cumulativeData['total_gir_hit']}}/{{$cumulativeData['total_gir']}})</td>
                    <td>@if($roundstats['girpercentage'] < $cumulativeData['total_gir_percentage']){{ Html::image('app_images/trend_down_arrow.png') }}@elseif ($roundstats['girpercentage'] > $cumulativeData['total_gir_percentage']){{ Html::image('app_images/trend_up_arrow.png') }} @endif</td>
                </tr>
                <tr>
                    <th>Putts per Hole</th>
                    <td>{{ number_format($roundstats['puttsperhole'], 2) }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Putts per GIR</th>
                    <td>{{ number_format($roundstats['puttspergir'], 2) }}</td>
                    <td></td>
                    <td></td>
                </tr>

                </tbody>
            </table>





    </div>
</div>
</div>
<script>
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



    $("#scorestable tbody tr.cardinfo").each(function () {
        var i=0;
        $(this).find('td.front9_pars').each(function (index) {
            var currentCell = $(this);
            var nextCell = $(this).closest('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').find('td').eq(i) : null;

            var statusCell = $(this).closest('tr').next('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').next('tr').find('td').eq(i) : null;

            var back9parsCell = $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i) : null;

            var back9scoresCell = $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i) : null;

            var back9statusCell = $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i).length > 0
                    ? $(this).closest('tr').next('tr').next('tr').next('tr').next('tr').next('tr').next('tr').next('tr').find('td').eq(i) : null;


//            alert(back9statusCell.attr('class'));

            var status = nextCell.text() - currentCell.text();
            var back9status = back9scoresCell.text() - back9parsCell.text();


                if ( status == -3 ) {
                    statusCell.css('backgroundColor', 'chartreuse');
//                    statusCell.append().text(status);
                    statusCell.append().text('Dbl Eagle');
                    back9statusCell.css('backgroundColor', 'chartreuse');
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

//            if ( currentCell.text() !== nextCell.text()) {
//                statusCell.css('backgroundColor', 'yellow');
//            }
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