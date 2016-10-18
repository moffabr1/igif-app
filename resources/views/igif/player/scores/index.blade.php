@extends('layouts.dashboard')
@section('page_heading','Scores')
@section('section')

    @if(Session::has('message'))
        <p class="bg-danger">{{session('message')}}</p>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Score</th>
            <th>Date</th>
            <th>Course</th>
            <th>Tees</th>
            <th>CR/Slope</th>
        </tr>
        </thead>
        <tbody>

        @if($scores)

            @foreach($scores as $score)


                <tr>
                    <td>{{$score->id}}</td>
                    <td>{{$score->total_score}}</td>
                    {{--<td><img height="100" width="100" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/100x100' }}" alt=""></td>--}}
                    <td>January, 1 1999</td>
                    <td>{{$score->scorecard->course->course_name}}</td>
                    <td>{{$score->scorecard->tee_color}}</td>
                    <td>{{$score->scorecard->rating}} / {{$score->scorecard->slope}}</td>
                    {{--<td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>--}}
                    {{--<td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>--}}
                    {{--<td>{{$post->title}}</td>--}}
                    {{--<td>{{$post->body}}</td>--}}
                    {{--<td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>--}}
                    {{--<td><a href="{{route('home.post', $post->id)}}">View Post</a></td>--}}
                    {{--<td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>--}}
                    {{--<td>{{$post->created_at->diffForHumans()}}</td>--}}
                    {{--<td>{{$post->updated_at->diffForHumans()}}</td>--}}
                </tr>


            @endforeach

        @endif


        </tbody>
    </table>


    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$scores->render()}}

        </div>
    </div>


@stop