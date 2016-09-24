@extends('layouts.dashboard')
@section('page_heading','Admin: Scorecard Management')
@section('section')


    @if(Session::has('message'))

        <p class="{{session('message_style')}}">{{session('message')}}</p>

    @endif


    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Club Name</th>
                <th>Course Name</th>
                <th>Tee Name</th>
                <th>Tee Color</th>
                <th>Par</th>
                <th>Rating</th>
                <th>Slope</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>
            {{--@foreach($clubs->courses->course_id as $course_id)--}}
            {{--{{$course_id}}--}}
            {{--@endforeach--}}

            @if($cards)

                @foreach($cards as $card)

                    <tr>
                        <td>{{$card->id}}</td>
                        <td>{{$card->club->club_name}}</td>
                        {{--<td><a href="{{route('igif.admin.clubs.edit', $course->club->id)}}">{{$course->club->club_name}}</a></td>--}}
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
                        {{--<td>{{$course->holes}}</td>--}}
                        {{--<td>{{$course->par}}</td>--}}
                        {{--<td>{{$course->created_at->diffForHumans()}}</td>--}}
                        {{--<td>{{$course->updated_at->diffForHumans()}}</td>--}}

                        {{--<td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a></td>--}}
                        {{--<td>{{$user->role ? $user->role->name : 'User has no role'}}</td>--}}
                    </tr>

                @endforeach

            @endif


            </tbody>
        </table>
    </div>




@stop
