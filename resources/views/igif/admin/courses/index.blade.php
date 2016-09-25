@extends('layouts.dashboard')
@section('page_heading','Admin: Golf Club Management')
@section('section')


    @if(Session::has('message'))

        <p class="{{session('message_style')}}">{{session('message')}}</p>

    @endif



<div class="col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Object Store</h3></div>
            <div class="panel-body">

                <table class="table table-condensed" style="border-collapse:collapse;">

                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Golf Club Name</th>
                        <th># of Holes</th>
                        <th>City, State, Country</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

        {{--@if($courses)--}}

            {{--@foreach($courses as $key=>$course)--}}

                @if($clubs)

                    @foreach($clubs as $key=>$club)

                        <tr data-toggle="collapse" data-target="#demo{{++$key}}" class="accordion-toggle">
                            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                            <td>{{$course->club->club_name}}</td>
                            <td>{{$course->club->number_of_holes}}</td>
                            <td>{{$course->club->city_name}}, {{$course->club->state_province_name}} {{$course->club->country_name}}</td>
                            <td>{{$course->created_at->format('m/d/Y')}}</td>
                            <td>{{$course->updated_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('igif.admin.clubs.create')}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Club"></i></a>
                                <a href="{{route('igif.admin.courses.edit', $course->club->id)}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit" title="Edit Club"></i></a>

                            </td>

                        </tr>
                        <tr>
                            <td colspan="12" class="hiddenRow">
                                <div class="accordian-body collapse" id="demo{{$key}}">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <i>Golf Courses at {{$course->club->club_name}}</i>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Course Name</th>
                                            <th># of Holes</th>
                                            <th>Course Par</th>
                                            <th> Created</th>
                                            <th> Updated</th>
                                            <th></th>
                                            <td>Actions</td>
                                            {{--<th>Actions</th>--}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if (strlen($course->course_name) > 0)<td>{{ $course->course_name }}</td>@else<td>{{ $course->club->club_name }}</td>@endif
                                            <td>{{$course->holes}}</td>
                                            <td>{{$course->par}}</td>
                                            <td>{{$course->created_at->diffForHumans()}}</td>
                                            <td>{{$course->updated_at->diffForHumans()}}</td>
                                            <td></td>
                                            <td>
                                                <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Course"></i></a>
                                                <a href="{{route('igif.admin.courses.edit', $course->club->id)}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit" title="Edit Course"></i></a>

                                            </td>
                                        </tr>

                                        <tr>
                                            <th>
                                                <i>Scorecards at {{$course->club->club_name}}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Tee Color</th>
                                            <th>Par</th>
                                            <th>Rating</th>
                                            <th>Slope</th>
                                            <th> Created</th>
                                            <th> Updated</th>
                                            <th>Actions</th>
                                        </tr>

                                        @foreach($scorecards as $scorecard)
                                            @if($scorecard->course_id == $course->id)
                                                <tr>
                                                    <td>{{$scorecard->tee_color}}</td>
                                                    <td>{{$scorecard->course_par_for_tee}}</td>
                                                    <td>{{$scorecard->rating}}</td>
                                                    <td>{{$scorecard->slope}}</td>
                                                    <td>{{$scorecard->created_at->diffForHumans()}}</td>
                                                    <td>{{$scorecard->updated_at->diffForHumans()}}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Scorecard"></i></a>
                                                        <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit" title="Edit Scorecard"></i></a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>

                                </div>
                            </td>
                        </tr>

            @endforeach
        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@stop
