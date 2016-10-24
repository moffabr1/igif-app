@extends('layouts.dashboard')
@section('page_heading','Scorecards')
@section('section')


{!! Form::open(['method'=>'GET', 'action'=> 'PlayerScorecardsController@index', 'id'=> 'scorecards']) !!}

<div class="row">
    <div class="col-md-8">
        <div id="scorecards_div" class="form-group">
            <label>Select a Scorecard</label>

            <select class="form-control input-sm" name="scorecard" id="scorecard" onchange="this.form.submit()">
                <option value="">Select a Scorecard</option>
                @foreach($rounds as $round)

                    <option value="{{$round->id}}">{{$round->total_score}}   -   {{$round->round_date}} : {{$round->scorecard->course->course_name}} </option>

                @endforeach
            </select>

        </div>
    </div>
</div>
{!! Form::close() !!}

<div class="row">
    <div class="container">
        <div class="col-sm-10">
        <h2 id="card_header"></h2>
            <table class="table table-sm table-bordered table-responsive">
                <tbody>
                <tr>
                    <td colspan="11">
                        Front 9
                    </td>
                </tr>
                <tr>
                    <th class="col-xs-1">
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
                <tr>
                    <th class="col-xs-1">
                        Par
                    </th>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                </tr>
                <tr>
                    <th class="col-xs-1">
                        Score
                    </th>
                    <td class="col-xs-1">
                        {{--{{ $score_data->hole1_score }}--}}
                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                </tr>
                <tr>
                    <th class="col-xs-1">
                        Status
                    </th>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                    <td class="col-xs-1">

                    </td>
                </tr>
                <tr>
                    <td colspan="11">
                        Legend
                    </td>
                </tr>
                </tbody>
            </table>
    </div>
</div>
</div>
{{--<script>--}}
    {{--$('#scorecards').on('change', function(e) {--}}
{{--//        console.log(e);--}}

        {{--var scorecard = e.target.value;--}}

        {{--console.log(e.target.value);--}}

        {{--//ajax--}}
        {{--$.getJSON('/ajax-call',--}}
            {{--{--}}
                {{--scorecard_id: scorecard,--}}
                {{--course_id: "{{$round->scorecard->course->id}}"--}}
            {{--},--}}

        {{--function (data) {--}}
            {{--//console.log(data);--}}
{{--//                    $('#card_header').append(cardObj.club_name);--}}
{{--//                    $.each(data, function(index, cardObj){--}}
{{--//                        $('#clubs').append('');--}}
{{--//                    });--}}
        {{--});--}}
    {{--})--}}
{{--</script>--}}

@stop