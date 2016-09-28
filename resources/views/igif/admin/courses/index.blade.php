@extends('layouts.dashboard')
@section('page_heading','Admin: Golf Courses Management')
@section('section')


    @if(Session::has('message'))
        <p class="{{session('message_style')}}">{{session('message')}}</p>
    @endif

    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <td colspan="10" align="right">add course: <a href="{{route('igif.admin.courses.create')}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Course"></i></a></td>
            </tr>
            <tr>
                <th>Id</th>
                <th>Club Name</th>
                <th>Course Name</th>
                <th>Holes</th>
                <th>Par</th>
                <th>Edit</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>

            @if($courses)

                @foreach($courses->sortBy('course_name') as $course)

                    <tr>
                        <td>{{$course->id}}</td>
                        <td><a href="{{route('igif.admin.clubs.edit', $course->club_id)}}">{{$course->club->club_name}}</a></td>
                        <td><a href="{{route('igif.admin.courses.edit', $course->id)}}">{{$course->course_name}}</a></td>
                        <td>{{$course->holes}}</td>
                        <td>{{$course->par}}</td>
                        <td>
                            <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Course"></i></a>
                            <a href="{{route('igif.admin.scorecards.edit', $course->id)}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit" title="Edit Course"></i></a>

                        </td>
                        <td>{{$course->created_at->diffForHumans()}}</td>
                        <td>{{$course->updated_at->diffForHumans()}}</td>

                    </tr>

                @endforeach

            @endif

            </tbody>
        </table>
    </div>






@stop
