@extends('layouts.dashboard')
@section('page_heading','Admin: Golf Club Management')
@section('section')


    @if(Session::has('message'))

        <p class="{{session('message_style')}}">{{session('message')}}</p>

    @endif


    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Club Id</th>
                <th>Name</th>
                {{--<th>Club Id</th>--}}
                <th>Scorecards</th>
                <th># of Holes</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>
            {{--@foreach($clubs->courses->course_id as $course_id)--}}
            {{--{{$course_id}}--}}
            {{--@endforeach--}}

            @if($clubs)

                @foreach($clubs as $club)

                    <tr>
                        <td>{{$club->id}}</td>
                        <td><a href="{{route('igif.admin.clubs.edit', $club->id)}}">{{$club->club_name}}</a></td>
                        <td>scorecards holder</td>
                        {{--<td><a href="{{route('igif.admin.users.edit', $user->id)}}">{{$user->name}}</a></td>--}}
                        {{--<td>{{$course->club_id}}</td>--}}
                        {{--<td>{{$course->scorecard ? $course->scorecard->tee_name : 'User has no role'}}</td>--}}
                        {{--<td>--}}
                            {{--<ul class="list-unstyled">--}}
                                {{--@foreach ($course->scorecard as $scorecard)--}}
                                    {{--<li><a href="{{$scorecard->id}}">Edit the {{ $scorecard->tee_name }} Scorecard</a></li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</td>--}}
                        <td>{{$club->number_of_holes}}</td>
                        {{--<td>{{$course->par}}</td>--}}
                        <td>{{$club->created_at->diffForHumans()}}</td>
                        <td>{{$club->updated_at->diffForHumans()}}</td>

                        {{--<td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a></td>--}}
                        {{--<td>{{$user->role ? $user->role->name : 'User has no role'}}</td>--}}
                    </tr>

                @endforeach

            @endif


            </tbody>
        </table>
    </div>



@stop
