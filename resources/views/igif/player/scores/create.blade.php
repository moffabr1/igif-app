@extends('layouts.dashboard')
@section('page_heading','Enter Score')
@section('section')



{!! Form::open(['method'=>'POST', 'action'=> 'PlayerScoresController@store']) !!}

{{--<div class="col-md-2">--}}
    {{--@foreach (App\Scorecard::all() as $course)--}}
        {{--{!! Form::select('scorecard_id', ['' => 'Choose Options'] + $scorecards, null, ['class'=>'form-control'])!!}--}}
    {{--{{ $scorecard }}--}}
    {{--@endforeach--}}
{{--</div>--}}

<div class="col-md-2">
    {{--<div class="form-group">--}}
        {{--<label>Select a Golf Club</label>--}}
        {{--<select class="form-control" name="clubs" id="clubs">--}}
            {{--@foreach($clubs as $club)--}}
                {{--{{ $club->id }}--}}
                {{--<option value="{{$club->id}}"class="form-control">{{$club->club_name}}--}}
                {{--</option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
    {{--</div>--}}
    <div id="states_div" class="form-group">
        <label>Select a State</label>
        <select class="form-control input-sm" name="states" id="states">
            <option value="">Select a State</option>
            @foreach($states as $state)

                <option value="{{$state->state_province_name}}">{{$state->state_province_name}}</option>

            @endforeach
        </select>
    </div>
    <div id="clubs_div" style="display:none" class="form-group">
        <label>Select a Golf Club</label>
        {{--{!! Form::select('role_id', ['' => 'Choose a Golf Course'] + $courses, null, ['class'=>'form-control', 'id' => 'courses'])!!}--}}
        <select class="form-control input-sm" name="clubs" id="clubs"></select>
    </div>

    <div id="courses_div" style="display:none" class="form-group">
        <label>Select a Golf Course</label>
        <select class="form-control input-sm" name="courses" id="courses"></select>
    </div>
    <div id="scorecards_div" style="display:none" class="form-group">
        <label>Select a Tee</label>
        <select class="form-control input-sm" name="scorecards" id="scorecards"></select>
    </div>

</div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Black</th>
            <th>R/S</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Yards</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th colspan="2">Hole #</th>
            {{--<td>&nbsp;</td>--}}
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
            <th>17</th>
            <th>18</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <th colspan="2">Score</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 1; $i < 19; $i++)
                <td>
                    <div class="form-group">
                        {!! Form::text('hole'.$i.'_score', null, ['class'=>'form-control', 'id' => 'hole'.$i.'_score', 'maxlength' => 2 ])!!}
                        {{--{!! Form::select('hole'.$i.'_gir',[1 => 'Yes', 0 => 'No'],null,['class'=>'form-control']) !!}--}}
                    </div>
                </td>
            @endfor
            <td>
                <div class="form-group">
                    {!! Form::text('result_score', null, ['class'=>'form-control', 'id' => 'result_score', 'readonly' => 'true'])!!}
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">Fairway Hit</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 1; $i < 19; $i++)
                <td>
                    {{--<div class="form-group">--}}
                        {{--{!! Form::select('hole'.$i.'_fw_hit', array(1 => 'Yes', 0 => 'No'), ['class'=>'form-control'])!!}--}}
                    {{--</div>--}}
                    <div align="center" class="form-group">
                        {!! Form::checkbox('hole'.$i.'_fw_hit', '1', false, ['class'=>'form-control'])!!}
                    </div>
                </td>
            @endfor
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th colspan="2">Drive Distance</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 1; $i < 19; $i++)
                <td>
                    <div class="form-group">
                        {!! Form::text('hole' . $i . '_drive_distance', null, ['class'=>'form-control'])!!}
                    </div>
                </td>
            @endfor
            <td>
                {{--<div class="form-group">--}}
                    {{--{!! Form::text('result_drive_distance', null, ['class'=>'form-control', 'id' => 'result_drive_distance', 'readonly' => 'true'])!!}--}}
                {{--</div>--}}
            </td>
        </tr>
        <tr>
            <th colspan="2">Green Hit</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 0; $i < 18; $i++)
            <td>
                <div class="form-group">
                    {!! Form::select('hole'.$i.'_gir', array(1 => 'Yes', 0 => 'No'), ['class'=>'form-control'])!!}
                </div>
            </td>
            @endfor
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th colspan="2">Approach Distance</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 0; $i < 18; $i++)
                <td>
                    <div class="form-group">
                        {!! Form::text('hole'.$i.'_distance_to_green', null, ['class'=>'form-control'])!!}
                    </div>
                </td>
            @endfor
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th colspan="2">Chips</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 0; $i < 18; $i++)
                <td>
                    <div class="form-group">
                        {!! Form::select('hole'.$i.'_number_of_chips', array(0 => '0', 1 => '1', 2 => '2'), ['class'=>'form-control'])!!}
                    </div>
                </td>
            @endfor
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th colspan="2">Sand</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 0; $i < 18; $i++)
                <td>
                    <div class="form-group">
                        {!! Form::select('hole'.$i.'_sand', array(0 => '0', 1 => '1', 2 => '2', 3 => '3'), ['class'=>'form-control'])!!}
                    </div>
                </td>
            @endfor
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th colspan="2">Putts</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 0; $i < 18; $i++)
                <td>
                    <div class="form-group">
                        {!! Form::select('hole'.$i.'_number_of_putts', array(0 => '0', 1 => '1', 2 => '2', 3 => '3'), ['class'=>'form-control'])!!}
                    </div>
                </td>
            @endfor
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th colspan="2">Putt 1 Length</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 0; $i < 18; $i++)
                <td>
                    <div class="form-group">
                        {!! Form::text('hole'.$i.'_1st_putt_distance', null, ['class'=>'form-control'])!!}
                    </div>
                </td>
            @endfor
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th colspan="2">Putt 2 Length</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 0; $i < 18; $i++)
                <td>
                    <div class="form-group">
                        {!! Form::text('hole'.$i.'_2nd_putt_distance', null, ['class'=>'form-control'])!!}
                    </div>
                </td>
            @endfor
            <td>&nbsp;</td>
        </tr>

        </tbody>
    </table>

    <div class="form-group col-sm-9">
        {!! Form::submit('Enter Score', ['class'=>'btn btn-primary']) !!}
    </div>


    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>

    <script>
        $(function() {
            $("#hole1_score, #hole2_score, " +
                    "#hole3_score, " +
                    "#hole4_score, " +
                    "#hole5_score, " +
                    "#hole6_score, " +
                    "#hole7_score, " +
                    "#hole8_score, " +
                    "#hole9_score, " +
                    "#hole10_score, " +
                    "#hole11_score, " +
                    "#hole12_score, " +
                    "#hole13_score, " +
                    "#hole14_score, " +
                    "#hole15_score, " +
                    "#hole16_score, " +
                    "#hole17_score, " +
                    "#hole18_score").on("keydown keyup", sum);

            function sum() {
                $("#result_score").val(
                        Number($("#hole1_score").val()) +
                        Number($("#hole2_score").val()) +
                        Number($("#hole3_score").val()) +
                        Number($("#hole4_score").val()) +
                        Number($("#hole5_score").val()) +
                        Number($("#hole6_score").val()) +
                        Number($("#hole7_score").val()) +
                        Number($("#hole8_score").val()) +
                        Number($("#hole9_score").val()) +
                        Number($("#hole10_score").val()) +
                        Number($("#hole11_score").val()) +
                        Number($("#hole12_score").val()) +
                        Number($("#hole13_score").val()) +
                        Number($("#hole14_score").val()) +
                        Number($("#hole15_score").val()) +
                        Number($("#hole16_score").val()) +
                        Number($("#hole17_score").val()) +
                        Number($("#hole18_score").val()));

            }
        });
    </script>
    <script>
        $('#states').on('change', function(e) {
            console.log(e);
            var state = e.target.value;

            //ajax

            $.getJSON("/ajax-call?state="+state, function (data) {
                console.log(data);
                $('#clubs').empty();
                $('#clubs_div').show();
                $('#clubs').append('<option value="">Select an Golf Club</option>');
                $.each(data, function(index, clubsObj){
                    $('#clubs').append('<option value="'+clubsObj.id+'">'+clubsObj.club_name+'</option>');
                });
            });
        });
        $('#clubs').on('change', function(e) {
            console.log(e);
            var club = e.target.value;

            //ajax

            $.getJSON("/ajax-call?club_id="+club, function (data) {
                console.log(data);
                $('#courses').empty();
                $('#courses_div').show();
                $('#courses').append('<option value="">Select an Golf Course</option>');
                $.each(data, function(index, coursesObj){
                    $('#courses').append('<option value="'+coursesObj.id+'">'+coursesObj.course_name+'</option>');
                });
            });
        });
        $('#courses').on('change', function(e) {
            console.log(e);
            var course = e.target.value;

            //ajax

            $.getJSON("/ajax-call?course_id="+course, function (data) {
                console.log(data);
                $('#scorecards').empty();
                $('#scorecards_div').show();
                $('#scorecards').append('<option value="">Select a Tee Box</option>');
                $.each(data, function(index, scorecardObj){
                    $('#scorecards').append('<option value="'+scorecardObj.id+'">'+scorecardObj.tee_color+'</option>');
                });
            });
        });

    </script>



@stop