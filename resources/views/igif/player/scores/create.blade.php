@extends('layouts.dashboard')
@section('page_heading','Enter Score')
@section('section')





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

<div id="cardform_div" style="display:none" class="form-group">
    {!! Form::open(['method'=>'POST', 'action'=> 'PlayerScoresController@store']) !!}
    <table class="table table-bordered">
        <thead>
        <tr>
            <th id="tee_color" class="tee_color"></th>

            <th id="rating_slope" class="rating_slope"></th>
            <th id="hole1_distance" class="hole1_distance"></th>
            <th id="hole2_distance" class="hole2_distance"></th>
            <th id="hole3_distance" class="hole3_distance"></th>
            <th id="hole4_distance" class="hole4_distance"></th>
            <th id="hole5_distance" class="hole5_distance"></th>
            <th id="hole6_distance" class="hole6_distance"></th>
            <th id="hole7_distance" class="hole7_distance"></th>
            <th id="hole8_distance" class="hole8_distance"></th>
            <th id="hole9_distance" class="hole9_distance"></th>
            <th id="hole10_distance" class="hole10_distance"></th>
            <th id="hole11_distance" class="hole11_distance"></th>
            <th id="hole12_distance" class="hole12_distance"></th>
            <th id="hole13_distance" class="hole13_distance"></th>
            <th id="hole14_distance" class="hole14_distance"></th>
            <th id="hole15_distance" class="hole15_distance"></th>
            <th id="hole16_distance" class="hole16_distance"></th>
            <th id="hole17_distance" class="hole17_distance"></th>
            <th id="hole18_distance" class="hole18_distance"></th>
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
            <th colspan="2">Par</th>
            {{--<td>&nbsp;</td>--}}
            @for ($i = 1; $i < 19; $i++)
                <th id="hole{!! $i !!}_par" class="hole1_par"></th>
            @endfor
            {{--<th>2</th>--}}
            {{--<th>3</th>--}}
            {{--<th>4</th>--}}
            {{--<th>5</th>--}}
            {{--<th>6</th>--}}
            {{--<th>7</th>--}}
            {{--<th>8</th>--}}
            {{--<th>9</th>--}}
            {{--<th>10</th>--}}
            {{--<th>11</th>--}}
            {{--<th>12</th>--}}
            {{--<th>13</th>--}}
            {{--<th>14</th>--}}
            {{--<th>15</th>--}}
            {{--<th>16</th>--}}
            {{--<th>17</th>--}}
            {{--<th>18</th>--}}
            {{--<th>&nbsp;</th>--}}
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

                //                if($.isEmptyObject(data)){
                if (Object.keys(data).length == 0) {

                        console.log("blank");
                    // If there is no scorecard must show link to add a scorecard for this course.

                }
                else {

                $('#scorecards').empty();
                $('#scorecards_div').show();
                $('#scorecards').append('<option value="">Select a Tee Box</option>');
                $.each(data, function (index, scorecardObj) {
                    $('#scorecards').append('<option value="' + scorecardObj.id + '">' + scorecardObj.tee_color + '</option>');

                    //console.log(index);
                });

            }


            });
        });

        $('#scorecards').on('change', function(e) {
            console.log(e);
            var scorecard = e.target.value;
            console.log(scorecard);


            $.getJSON("/ajax-call?scorecard_id="+scorecard, function (data) {
                console.log(data);
//                $('#scorecard').empty();
                $('#cardform_div').show();
                $('#clubs_div').hide();
                $('#courses_div').hide();
                $('#scorecards_div').hide();

                $('#tee_color').empty();
                $('#rating_slope').empty();
                $('#hole1_distance').empty();



                    $.each(data, function (index, teeObj) {

                        $('#tee_color').append('<th>' + teeObj.tee_color + '</th>');
                        $('#rating_slope').append('<th>' + teeObj.rating + ' / ' + teeObj.slope + '</th>');
                        $('#hole1_distance').append('<th>' + teeObj.hole1_distance + ' Yards</th>');
                        $('#hole2_distance').append('<th>' + teeObj.hole2_distance + ' Yards</th>');
                        $('#hole3_distance').append('<th>' + teeObj.hole3_distance + ' Yards</th>');
                        $('#hole4_distance').append('<th>' + teeObj.hole4_distance + ' Yards</th>');
                        $('#hole5_distance').append('<th>' + teeObj.hole5_distance + ' Yards</th>');
                        $('#hole6_distance').append('<th>' + teeObj.hole6_distance + ' Yards</th>');
                        $('#hole7_distance').append('<th>' + teeObj.hole7_distance + ' Yards</th>');
                        $('#hole8_distance').append('<th>' + teeObj.hole8_distance + ' Yards</th>');
                        $('#hole9_distance').append('<th>' + teeObj.hole9_distance + ' Yards</th>');
                        $('#hole10_distance').append('<th>' + teeObj.hole10_distance + ' Yards</th>');
                        $('#hole11_distance').append('<th>' + teeObj.hole11_distance + ' Yards</th>');
                        $('#hole12_distance').append('<th>' + teeObj.hole12_distance + ' Yards</th>');
                        $('#hole13_distance').append('<th>' + teeObj.hole13_distance + ' Yards</th>');
                        $('#hole14_distance').append('<th>' + teeObj.hole14_distance + ' Yards</th>');
                        $('#hole15_distance').append('<th>' + teeObj.hole15_distance + ' Yards</th>');
                        $('#hole16_distance').append('<th>' + teeObj.hole16_distance + ' Yards</th>');
                        $('#hole17_distance').append('<th>' + teeObj.hole17_distance + ' Yards</th>');
                        $('#hole18_distance').append('<th>' + teeObj.hole18_distance + ' Yards</th>');

                        $('#hole1_par').append('<th>' + teeObj.hole1_par + '</th>');
                        $('#hole2_par').append('<th>' + teeObj.hole2_par + '</th>');
                        $('#hole3_par').append('<th>' + teeObj.hole3_par + '</th>');
                        $('#hole4_par').append('<th>' + teeObj.hole4_par + '</th>');
                        $('#hole5_par').append('<th>' + teeObj.hole5_par + '</th>');
                        $('#hole6_par').append('<th>' + teeObj.hole6_par + '</th>');
                        $('#hole7_par').append('<th>' + teeObj.hole7_par + '</th>');
                        $('#hole8_par').append('<th>' + teeObj.hole8_par + '</th>');
                        $('#hole9_par').append('<th>' + teeObj.hole9_par + '</th>');
                        $('#hole10_par').append('<th>' + teeObj.hole10_par + '</th>');
                        $('#hole11_par').append('<th>' + teeObj.hole11_par + '</th>');
                        $('#hole12_par').append('<th>' + teeObj.hole12_par + '</th>');
                        $('#hole13_par').append('<th>' + teeObj.hole13_par + '</th>');
                        $('#hole14_par').append('<th>' + teeObj.hole14_par + '</th>');
                        $('#hole15_par').append('<th>' + teeObj.hole15_par + '</th>');
                        $('#hole16_par').append('<th>' + teeObj.hole16_par + '</th>');
                        $('#hole17_par').append('<th>' + teeObj.hole17_par + '</th>');
                        $('#hole18_par').append('<th>' + teeObj.hole18_par + '</th>');

                        console.log(teeObj.hole1_distance);
                    });

//                }


//                $('#hole1_distance').append('<th>data.items[0].hole1_distance</th>');
//                $('#scorecard').append('<option value="">Select a Tee Box</option>');
//                $.each(data, function(index, scorecardObj){
//                    $('#scorecards').append('<option value="'+scorecardObj.id+'">'+scorecardObj.tee_color+'</option>');
//
//                    //console.log(index);
//                });


            });
//            $('#hole1_distance').append('<th>'+scorecardObj+'</th>');
        });

    </script>



@stop