@extends('layouts.dashboard')
@section('page_heading','Admin: Create Scorecard')
@section('section')

    {!! Form::open(['method'=>'POST', 'action'=> 'AdminScorecardsController@store','files'=>true]) !!}

    {{--{!! Form::hidden('course_par_for_tee', ['id' => 'course_par_for_tee']) !!}--}}
    {{ Form::hidden('course_par_for_tee', 'secret', array('id' => 'course_par_for_tee')) }}

    <table class = "table table-condensed" border="0">
        {{--<caption>Condensed Table Layout</caption>--}}

        <thead>
        <tr>
            <th colspan="3">
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('', 'Select Course:') !!}--}}
                    {{--{!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control'])!!}--}}
                    {!! Form::select('course_id', [''=>'Choose Golf Course'] + $courses , null, ['class'=>'form-control'])!!}
                {{--</div>--}}

            </th>
            <th class="info" colspan="9">
                <div class="text-center">Hole Yardages</div>
            </th>
            <th>
                total
            </th>
        </tr>
        <tr>
            <th><div class="text-center">Tee</div></th>
            <th><div class="text-center">Rating</div></th>
            <th><div class="text-center">Slope</div></th>
            <th><div class="text-center">Hole 1</div></th>
            <th>Hole 2 </th>
            <th>Hole 3 </th>
            <th>Hole 4 </th>
            <th>Hole 5 </th>
            <th>Hole 6 </th>
            <th>Hole 7 </th>
            <th>Hole 8 </th>
            <th>Hole 9 </th>
            <th>&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td style="width: 5%;">
                <div class="form-group">
                {{--{!! Form::label('tee_color', 'Tee Color:') !!}--}}
                {!! Form::select('tee_color', array('Black' => 'Black', 'Blue' => 'Blue', 'White' => 'White', 'Green' => 'Green', 'Yellow' => 'Yellow', 'Red' => 'Red'), null, ['class'=>'form-control'])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                {{--{!! Form::label('rating', 'Rating:') !!}--}}
                {!! Form::text('rating', null, ['class'=>'form-control'])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('slope', null, ['class'=>'form-control'])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole1_distance', null, ['class'=>'form-control', 'id' => 'hole1_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole2_distance', null, ['class'=>'form-control', 'id' => 'hole2_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole3_distance', null, ['class'=>'form-control', 'id' => 'hole3_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole4_distance', null, ['class'=>'form-control', 'id' => 'hole4_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole5_distance', null, ['class'=>'form-control', 'id' => 'hole5_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole6_distance', null, ['class'=>'form-control', 'id' => 'hole6_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole7_distance', null, ['class'=>'form-control', 'id' => 'hole7_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole8_distance', null, ['class'=>'form-control', 'id' => 'hole8_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole9_distance', null, ['class'=>'form-control', 'id' => 'hole9_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {!! Form::text('result_front_nine', null, ['class'=>'form-control', 'id' => 'result_front_nine', 'readonly' => 'true'])!!}
                </div>
            </td>
        </tr>

        <tr>
            <th style="width: 5%;" colspan="3">
                <div class="form-group text-center">
                    Par for Each Hole
                </div>
            </th>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole1_par', null, ['class'=>'form-control', 'id' => 'hole1_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole2_par', null, ['class'=>'form-control', 'id' => 'hole2_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole3_par', null, ['class'=>'form-control', 'id' => 'hole3_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole4_par', null, ['class'=>'form-control', 'id' => 'hole4_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole5_par', null, ['class'=>'form-control', 'id' => 'hole5_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole6_par', null, ['class'=>'form-control', 'id' => 'hole6_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole7_par', null, ['class'=>'form-control', 'id' => 'hole7_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole8_par', null, ['class'=>'form-control', 'id' => 'hole8_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole9_par', null, ['class'=>'form-control', 'id' => 'hole9_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {!! Form::text('result_front_nine_par', null, ['class'=>'form-control', 'id' => 'result_front_nine_par', 'readonly' => 'true'])!!}
                </div>
            </td>
        </tr>

        <tr>
            <th style="width: 5%;" colspan="3">
                <div class="form-group text-center">
                    Handicap for Each Hole
                </div>
            </th>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole1_handicap', null, ['class'=>'form-control', 'id' => 'hole1_handicap', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole2_handicap', null, ['class'=>'form-control', 'id' => 'hole2_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole3_handicap', null, ['class'=>'form-control', 'id' => 'hole3_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole4_handicap', null, ['class'=>'form-control', 'id' => 'hole4_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole5_handicap', null, ['class'=>'form-control', 'id' => 'hole5_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole6_handicap', null, ['class'=>'form-control', 'id' => 'hole6_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole7_handicap', null, ['class'=>'form-control', 'id' => 'hole7_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole8_handicap', null, ['class'=>'form-control', 'id' => 'hole8_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole9_handicap', null, ['class'=>'form-control', 'id' => 'hole9_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                {{--<div class="form-group">--}}
                    {{--{!! Form::text('result_front_nine_handicap', null, ['class'=>'form-control', 'id' => 'result_front_nine_handicap', 'readonly' => 'true'])!!}--}}
                {{--</div>--}}
            </td>
        </tr>

        </tbody>
        <thead>
        <tr>
            <th rowspan="3" colspan="3">
                &nbsp;
            </th>
            <th class="info" colspan="9">
                <div class="text-center">Hole Yardages</div>
            </th>
            <th>
                total
            </th>
        </tr>
        <tr>
            <th><div class="text-center">Hole 1</div></th>
            <th>Hole 2 </th>
            <th>Hole 3 </th>
            <th>Hole 4 </th>
            <th>Hole 5 </th>
            <th>Hole 6 </th>
            <th>Hole 7 </th>
            <th>Hole 8 </th>
            <th>Hole 9 </th>
            <th></th>
        </tr>
        <tr>

            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole10_distance', null, ['class'=>'form-control', 'id' => 'hole10_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole11_distance', null, ['class'=>'form-control', 'id' => 'hole11_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole12_distance', null, ['class'=>'form-control', 'id' => 'hole12_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole13_distance', null, ['class'=>'form-control', 'id' => 'hole13_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole14_distance', null, ['class'=>'form-control', 'id' => 'hole14_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole15_distance', null, ['class'=>'form-control', 'id' => 'hole15_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole16_distance', null, ['class'=>'form-control', 'id' => 'hole16_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole17_distance', null, ['class'=>'form-control', 'id' => 'hole17_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole18_distance', null, ['class'=>'form-control', 'id' => 'hole18_distance', 'maxlength' => 3 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {!! Form::text('result_back_nine', null, ['class'=>'form-control', 'id' => 'result_back_nine', 'readonly' => 'true'])!!}
                </div>
            </td>
        </tr>
        <tr>
            <th style="width: 5%;" colspan="3">
                <div class="form-group text-center">
                    Par for Each Hole
                </div>
            </th>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole10_par', null, ['class'=>'form-control', 'id' => 'hole10_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole11_par', null, ['class'=>'form-control', 'id' => 'hole11_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole12_par', null, ['class'=>'form-control', 'id' => 'hole12_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole13_par', null, ['class'=>'form-control', 'id' => 'hole13_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole14_par', null, ['class'=>'form-control', 'id' => 'hole14_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole15_par', null, ['class'=>'form-control', 'id' => 'hole15_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole16_par', null, ['class'=>'form-control', 'id' => 'hole16_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole17_par', null, ['class'=>'form-control', 'id' => 'hole17_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole18_par', null, ['class'=>'form-control', 'id' => 'hole18_par', 'maxlength' => 1 ])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {!! Form::text('result_back_nine_par', null, ['class'=>'form-control', 'id' => 'result_back_nine_par', 'readonly' => 'true'])!!}
                </div>
            </td>
        </tr>

        <tr>
            <th style="width: 5%;" colspan="3">
                <div class="form-group text-center">
                    Handicap for Each Hole
                </div>
            </th>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole10_handicap', null, ['class'=>'form-control', 'id' => 'hole10_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole11_handicap', null, ['class'=>'form-control', 'id' => 'hole11_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole12_handicap', null, ['class'=>'form-control', 'id' => 'hole12_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole13_handicap', null, ['class'=>'form-control', 'id' => 'hole13_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole14_handicap', null, ['class'=>'form-control', 'id' => 'hole14_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole15_handicap', null, ['class'=>'form-control', 'id' => 'hole15_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole16_handicap', null, ['class'=>'form-control', 'id' => 'hole16_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole17_handicap', null, ['class'=>'form-control', 'id' => 'hole17_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                <div class="form-group">
                    {{--{!! Form::label('rating', 'Rating:') !!}--}}
                    {!! Form::text('hole18_handicap', null, ['class'=>'form-control', 'id' => 'hole18_handicap', 'maxlength' => 1])!!}
                </div>
            </td>
            <td style="width: 5%;">
                {{--<div class="form-group">--}}
                    {{--{!! Form::text('result_back_nine_handicap', null, ['class'=>'form-control', 'id' => 'result_back_nine_handicap', 'readonly' => 'true'])!!}--}}
                {{--</div>--}}
            </td>
        </tr>

        </tbody>

    </table>

    <div class="form-group col-sm-9">
        {!! Form::submit('Create Scorecard', ['class'=>'btn btn-primary']) !!}
    </div>

    <div class="row">

        @include('includes.form_error')

    </div>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>

    <script>
        $(function() {
            $("#hole1_distance, #hole2_distance, " +
                    "#hole3_distance, " +
                    "#hole4_distance, " +
                    "#hole5_distance, " +
                    "#hole6_distance, " +
                    "#hole7_distance, " +
                    "#hole8_distance, " +
                    "#hole9_distance, " +
                    "#hole10_distance, " +
                    "#hole11_distance, " +
                    "#hole12_distance, " +
                    "#hole13_distance, " +
                    "#hole14_distance, " +
                    "#hole15_distance, " +
                    "#hole16_distance, " +
                    "#hole17_distance, " +
                    "#hole18_distance, " +
                    "#hole1_par, " +
                    "#hole2_par, " +
                    "#hole3_par, " +
                    "#hole4_par, " +
                    "#hole5_par, " +
                    "#hole6_par, " +
                    "#hole7_par, " +
                    "#hole8_par, " +
                    "#hole9_par, " +
                    "#hole10_par, " +
                    "#hole11_par, " +
                    "#hole12_par, " +
                    "#hole13_par, " +
                    "#hole14_par, " +
                    "#hole15_par, " +
                    "#hole16_par, " +
                    "#hole17_par, " +
                    "#hole18_par").on("keydown keyup", sum);


            function sum() {
                $("#result_front_nine").val(
                        Number($("#hole1_distance").val()) +
                        Number($("#hole2_distance").val()) +
                        Number($("#hole3_distance").val()) +
                        Number($("#hole4_distance").val()) +
                        Number($("#hole5_distance").val()) +
                        Number($("#hole6_distance").val()) +
                        Number($("#hole7_distance").val()) +
                        Number($("#hole8_distance").val()) +
                        Number($("#hole9_distance").val()));

                $("#result_back_nine").val(
                        Number($("#hole10_distance").val()) +
                        Number($("#hole11_distance").val()) +
                        Number($("#hole12_distance").val()) +
                        Number($("#hole13_distance").val()) +
                        Number($("#hole14_distance").val()) +
                        Number($("#hole15_distance").val()) +
                        Number($("#hole16_distance").val()) +
                        Number($("#hole17_distance").val()) +
                        Number($("#hole18_distance").val()));

                $("#result_front_nine_par").val(
                        Number($("#hole1_par").val()) +
                        Number($("#hole2_par").val()) +
                        Number($("#hole3_par").val()) +
                        Number($("#hole4_par").val()) +
                        Number($("#hole5_par").val()) +
                        Number($("#hole6_par").val()) +
                        Number($("#hole7_par").val()) +
                        Number($("#hole8_par").val()) +
                        Number($("#hole9_par").val()));

                $("#result_back_nine_par").val(
                        Number($("#hole10_par").val()) +
                        Number($("#hole11_par").val()) +
                        Number($("#hole12_par").val()) +
                        Number($("#hole13_par").val()) +
                        Number($("#hole14_par").val()) +
                        Number($("#hole15_par").val()) +
                        Number($("#hole16_par").val()) +
                        Number($("#hole17_par").val()) +
                        Number($("#hole18_par").val()));

                $("#course_par_for_tee").val(
                        Number($("#result_front_nine_par").val()) +
                        Number($("#result_back_nine_par").val()));

            }
        });
    </script>






@stop