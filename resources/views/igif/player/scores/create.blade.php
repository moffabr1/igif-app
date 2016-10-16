@extends('layouts.dashboard')
@section('page_heading','Enter Score')
@section('section')

    <style>

        .table-nowrap {
            table-layout:fixed;
        }

        .table-nowrap td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

        }

        #cssTable td
        {
            text-align:center;
            vertical-align:middle;
            font-size: 12px;
        }

    </style>

    {{--{!! Form::open(['method'=>'GET', 'action'=> 'PlayerScoresController@show', 1]) !!}--}}
        <div class="col-md-2">
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
            <div id="add_new_scorecard_link_div" style="display:none" class="form-group">
                <label>No Scorecard exists for this Course</label>
                <a href="">Create a Scorecard for this Course</a>
            </div>
        </div>
    {{--{!! Form::close() !!}--}}

    {{--<script>--}}
    {{--$('#scorecards').on('change', function(e){--}}
    {{--var select = $(this), form = select.closest('form');--}}
    {{--form.attr('action', '/' + select.val());--}}
    {{--form.submit();--}}
    {{--});--}}
    {{--</script>--}}

    <div id="cardform_div" style="display:none" class="form-group">
        {!! Form::open(['method'=>'POST', 'action'=> 'PlayerScoresController@store', 'id'=> 'scorecardForm']) !!}
        <input type="hidden" id="hidden_club_name" name="club-name" value="" />
        <input type="hidden" id="hidden_course_name" name="course-name" value="" />
        <input type="hidden" id="hidden_scorecard_id" name="scorecard-id" value="" />
        <input type="hidden" id="hidden_tee_name" name="tee-name" value="" />
        {{--<input type="hidden" id="hidden_scorecard_id" value="">--}}
        <h2 id="course_name_header"></h2>
        <div class="col-md-8" role="complementary">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-nowrap" id="cssTable">
                        <tbody>
                        <tr>
                            <th colspan="11">
                                Front 9
                            </th>
                        </tr>
                        <tr class="info">
                            <td id="tee_color">

                            </td>
                            <td id="rating_slope">
                            </td>
                            <td id="hole1_distance">
                            </td>
                            <td id="hole2_distance">
                            </td>
                            <td id="hole3_distance">
                            </td>
                            <td id="hole4_distance">
                            </td>
                            <td id="hole5_distance">
                            </td>
                            <td id="hole6_distance">
                            </td>
                            <td id="hole7_distance">
                            </td>
                            <td id="hole8_distance">
                            </td>
                            <td id="hole9_distance">
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="success">
                            <th colspan="2">
                                Hole #
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
                            <th colspan="2">
                                Score
                            </th>
                            @for ($i = 1; $i < 10; $i++)
                                {{--<td id="hole{!! $i !!}_par" class="hole1_par"></td>--}}
                                <td>
                                {!! Form::text('hole'.$i.'_strokes', null, ['class'=>'form-control', 'id' => 'hole'.$i.'_strokes', 'maxlength' => 2 ])!!}
                                </td>
                            @endfor
                            <td>
                                {{--<input type="text" class="form-control input-sm" maxlength="2">--}}
                                {!! Form::text('strokes_front_nine', null, ['class'=>'form-control', 'id' => 'strokes_front_nine', 'readonly' => 'true'])!!}
                            </td>

                        </tr>
                        <tr class="active">
                            <th colspan="2">
                                Par
                            </th>
                            @for ($i = 1; $i < 10; $i++)
                                {{--<td id="hole{!! $i !!}_par" class="hole{!! $i !!}_par"></td>--}}
                                <td id="hole{!! $i !!}_par"></td>
                            @endfor
                            <td id="result_front_nine_par">
                                {{--<input type="text" class="form-control input-sm" maxlength="2">--}}
                                {{--{!! Form::text('result_front_nine_par', null, ['class'=>'form-control', 'id' => 'result_front_nine_par', 'readonly' => 'true'])!!}--}}
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                Drive Distance
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                             -->
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Fairway Hit
                            </th>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Approach Distance
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                             -->
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Green Hit
                            </th>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Chips
                            </th>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->

                        </tr>
                        <tr>
                            <th colspan="2">
                                Sand
                            </th>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Putts
                            </th>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Putt 1 Length
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                             -->
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Putt 2 Length
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                             -->
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <td id="9-hole-submit-button" style="display:none" colspan="4">
                                <button type="button" class="btn btn-primary">Submit 9 Hole Score</button>
                            </td>
                        </tr>





                        </tbody>
                    </table>

<div id="back-9-table" style="display:none">
                    <table class="table table-bordered table-condensed table-nowrap" id="cssTable">
                        <tbody>
                        <tr>
                            <th colspan="11">
                                Back 9
                            </th>
                        </tr>
                        <tr class="info">
                            <td id="tee_color">

                            </td>
                            <td id="rating_slope">
                            </td>
                            <td id="hole10_distance">
                            </td>
                            <td id="hole11_distance">
                            </td>
                            <td id="hole12_distance">
                            </td>
                            <td id="hole13_distance">
                            </td>
                            <td id="hole14_distance">
                            </td>
                            <td id="hole15_distance">
                            </td>
                            <td id="hole16_distance">
                            </td>
                            <td id="hole17_distance">
                            </td>
                            <td id="hole18_distance">
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="success">
                            <th colspan="2">
                                Hole #
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
                            <!--
                                        <td>
                                            123
                                        </td>
                             -->
                            <!--
                                        <td>
                                            123
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Score
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            123
                                        </td>
                             -->

                        </tr>
                        <tr class="active">
                            <th colspan="2">
                                Par
                            </th>
                            @for ($i = 10; $i < 19; $i++)
                                <td id="hole{!! $i !!}_par"></td>
                            @endfor
                                <td id="result_back_nine_par">
                                </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                Drive Distance
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                             -->
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Fairway Hit
                            </th>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Approach Distance
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                             -->
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Green Hit
                            </th>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td align="center">
                                <input type="checkbox" name="" value="" checked="checked">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Chips
                            </th>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->

                        </tr>
                        <tr>
                            <th colspan="2">
                                Sand
                            </th>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Putts
                            </th>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td align="center">
                                <select>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Putt 1 Length
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                             -->
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <th colspan="2">
                                Putt 2 Length
                            </th>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm">
                            </td>
                            <!--
                                        <td>
                                            289
                                        </td>
                             -->
                            <!--
                                        <td>
                                            289
                                        </td>
                                        <td>
                                            289
                                        </td>
                             -->
                        </tr>
                        <tr>
                            <td colspan="4">
                                <button type="button" class="btn btn-primary">Submit 18 Hole Score</button>
                            </td>
                        </tr>




                        </tbody>
                    </table>
</div>



                </div>
            </div>
        </div>

    </div>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>

{{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--var sum = 0;--}}
    {{--$('tr').find('.f9_par').each(function () {--}}
    {{--var f9_par = $(this).text();--}}
        {{--alert(f9_par);--}}
    {{--if (!isNaN(f9_par) && f9_par.length !== 0) {--}}
    {{--sum += parseFloat(f9_par);--}}
    {{--}--}}
    {{--});--}}

    {{--$('.result_front_nine_par').html(sum);--}}
    {{--});--}}
{{--</script>--}}


    <script>
        $(function() {
            $("#hole1_strokes, #hole2_strokes, " +
                    "#hole3_strokes, " +
                    "#hole4_strokes, " +
                    "#hole5_strokes, " +
                    "#hole6_strokes, " +
                    "#hole7_strokes, " +
                    "#hole8_strokes, " +
                    "#hole9_strokes, " +
                    "#hole10_strokes, " +
                    "#hole11_strokes, " +
                    "#hole12_strokes, " +
                    "#hole13_strokes, " +
                    "#hole14_strokes, " +
                    "#hole15_strokes, " +
                    "#hole16_strokes, " +
                    "#hole17_strokes, " +
                    "#hole18_strokes").on("keydown keyup", sum);


            function sum() {
                $("#strokes_front_nine").val(
                        Number($("#hole1_strokes").val()) +
                        Number($("#hole2_strokes").val()) +
                        Number($("#hole3_strokes").val()) +
                        Number($("#hole4_strokes").val()) +
                        Number($("#hole5_strokes").val()) +
                        Number($("#hole6_strokes").val()) +
                        Number($("#hole7_strokes").val()) +
                        Number($("#hole8_strokes").val()) +
                        Number($("#hole9_strokes").val()));

                $("#strokes_back_nine").val(
                        Number($("#hole10_strokes").val()) +
                        Number($("#hole11_strokes").val()) +
                        Number($("#hole12_strokes").val()) +
                        Number($("#hole13_strokes").val()) +
                        Number($("#hole14_strokes").val()) +
                        Number($("#hole15_strokes").val()) +
                        Number($("#hole16_strokes").val()) +
                        Number($("#hole17_strokes").val()) +
                        Number($("#hole18_strokes").val()));
            }
        });
    </script>
    <script>
        $('#states').on('change', function(e) {
            console.log(e);

            if ( $('#cardform_div').is(':visible') ) {
                $('#clubs_div').hide();
                $('#courses_div').hide();
                $('#scorecards_div').hide();
                $('#cardform_div').hide();
                $('#add_new_scorecard_link_div').hide();
//                alert("visible");
            }

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

            var club_name = $( "#clubs option:selected" ).text();
//            alert(club_name);
            $("#hidden_club_name").val(club_name);
//            alert($('#hidden_club_name').val());


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

            var course_name = $( "#courses option:selected" ).text();
            alert(course_name);
            $("#hidden_course_name").val(course_name);
            alert($('#hidden_course_name').val());


            //ajax

            $.getJSON("/ajax-call?course_id="+course, function (data) {
                console.log(data);

                //                if($.isEmptyObject(data)){
                if (Object.keys(data).length == 0) {

                        console.log("blank");
                    // If there is no scorecard must show link to add a scorecard for this course.
//                    add_new_scorecard_link_div
                    $('#add_new_scorecard_link_div').show();

                }
                else {

                $('#scorecards').empty();
                $('#scorecards_div').show();
                $('#scorecards').append('<option value="">Select a Tee Box</option>');
                $.each(data, function (index, scorecardObj) {
                    $('#scorecards').append('<option value="' + scorecardObj.id + '">' + scorecardObj.tee_color + '</option>');

//                    console.log(index);
//                    console.log(index);
                });

            }


            });
        });




        $('#scorecards').on('change', function(e) {
            console.log(e);
            var scorecard = e.target.value;
            console.log(scorecard);

            var scorecard_id = $( "#scorecards option:selected" ).val();
            var tee_name = $( "#scorecards option:selected" ).text();

//            alert(scorecard_id);
            $("#hidden_scorecard_id").val(scorecard_id);
            $("#hidden_tee_name").val(tee_name);
            alert($('#hidden_scorecard_id').val());
            alert($('#hidden_tee_name').val());



            $.getJSON("/ajax-call?scorecard_id="+scorecard, function (data) {
                console.log(data);
                $('#cardform_div').show();
                $('#clubs_div').hide();
                $('#courses_div').hide();
                $('#scorecards_div').hide();

                $('#tee_color').empty();
                $('#rating_slope').empty();

                    $.each(data, function (index, teeObj) {

                        $('#course_name_header').append(teeObj.course_id.course_name);
                        $('#tee_color').append(teeObj.tee_color);
                        $('#rating_slope').append(teeObj.rating + ' /<br> ' + teeObj.slope);
                        $('#hole1_distance').append(teeObj.hole1_distance);
                        $('#hole2_distance').append(teeObj.hole2_distance);
                        $('#hole3_distance').append(teeObj.hole3_distance);
                        $('#hole4_distance').append(teeObj.hole4_distance);
                        $('#hole5_distance').append(teeObj.hole5_distance);
                        $('#hole6_distance').append(teeObj.hole6_distance);
                        $('#hole7_distance').append(teeObj.hole7_distance);
                        $('#hole8_distance').append(teeObj.hole8_distance);
                        $('#hole9_distance').append(teeObj.hole9_distance);

                        $('#hole1_par').append(teeObj.hole1_par);
                        $('#hole2_par').append(teeObj.hole2_par);
                        $('#hole3_par').append(teeObj.hole3_par);
                        $('#hole4_par').append(teeObj.hole4_par);
                        $('#hole5_par').append(teeObj.hole5_par);
                        $('#hole6_par').append(teeObj.hole6_par);
                        $('#hole7_par').append(teeObj.hole7_par);
                        $('#hole8_par').append(teeObj.hole8_par);
                        $('#hole9_par').append(teeObj.hole9_par);

                            if(teeObj.hole10_distance != null) {

                                $('#back-9-table').show();

                                $('#hole10_distance').append(teeObj.hole10_distance);
                                $('#hole11_distance').append(teeObj.hole11_distance);
                                $('#hole12_distance').append(teeObj.hole12_distance);
                                $('#hole13_distance').append(teeObj.hole13_distance);
                                $('#hole14_distance').append(teeObj.hole14_distance);
                                $('#hole15_distance').append(teeObj.hole15_distance);
                                $('#hole16_distance').append(teeObj.hole16_distance);
                                $('#hole17_distance').append(teeObj.hole17_distance);
                                $('#hole18_distance').append(teeObj.hole18_distance);

                                $('#hole10_par').append(teeObj.hole10_par);
                                $('#hole11_par').append(teeObj.hole11_par);
                                $('#hole12_par').append(teeObj.hole12_par);
                                $('#hole13_par').append(teeObj.hole13_par);
                                $('#hole14_par').append(teeObj.hole14_par);
                                $('#hole15_par').append(teeObj.hole15_par);
                                $('#hole16_par').append(teeObj.hole16_par);
                                $('#hole17_par').append(teeObj.hole17_par);
                                $('#hole18_par').append(teeObj.hole18_par);

                                $('#result_back_nine_par').append(teeObj.hole10_par +
                                        teeObj.hole11_par +
                                        teeObj.hole12_par +
                                        teeObj.hole13_par +
                                        teeObj.hole14_par +
                                        teeObj.hole15_par +
                                        teeObj.hole16_par +
                                        teeObj.hole17_par +
                                        teeObj.hole18_par
                                        );

                            } else {
                                $('#back-9-table').hide();
                                $('#9-hole-submit-button').show();
                            }

                        $('#result_front_nine_par').append(teeObj.hole1_par +
                                teeObj.hole2_par +
                                teeObj.hole3_par +
                                teeObj.hole4_par +
                                teeObj.hole5_par +
                                teeObj.hole6_par +
                                teeObj.hole7_par +
                                teeObj.hole8_par +
                                teeObj.hole9_par
                                );

                    });

            });

        });


    </script>



@stop