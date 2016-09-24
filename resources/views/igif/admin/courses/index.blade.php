@extends('layouts.dashboard')
@section('page_heading','Admin: Golf Course Management')
@section('section')


    @if(Session::has('message'))

        <p class="{{session('message_style')}}">{{session('message')}}</p>

    @endif


    <div class="container">
        <h2>Striped Rows</h2>
        <p>The .table-striped class adds zebra-stripes to a table:</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Course Id</th>
                <th>Name</th>
                <th>Club Id</th>
                <th># of Holes</th>
                <th>Par</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>
{{--@foreach($clubs->courses->course_id as $course_id)--}}
    {{--{{$course_id}}--}}
{{--@endforeach--}}

            @if($courses)

                @foreach($courses as $course)

                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->club->club_name}}</td>
                        <td>{{$course->club_id}}</td>
                        <td>{{$course->holes}}</td>
                        <td>{{$course->par}}</td>
                        <td>{{$course->created_at->diffForHumans()}}</td>
                        <td>{{$course->updated_at->diffForHumans()}}</td>
                    </tr>

                @endforeach

            @endif


            </tbody>
        </table>
    </div>



@stop
