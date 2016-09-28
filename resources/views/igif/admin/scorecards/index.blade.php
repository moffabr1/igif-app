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
                <td colspan="10" align="right">add scorecard: <a href="{{route('igif.admin.scorecards.create')}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Course"></i></a></td>
            </tr>
            <tr>
                <th>Id</th>
                <th>Club Name</th>
                <th>Course Name</th>
                <th>Tee</th>
                <th>Par</th>
                <th>Rating / Slope</th>
                <th>Edit</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>

            @if($cards)

                @foreach($cards->sortBy('course_id') as $card)

                    <tr>
                        <td>{{$card->id}}</td>
                        {{--$user->photo->file--}}
                        <td><a href="{{route('igif.admin.clubs.edit', $card->course->club->id)}}">{{$card->course->club->club_name}}</a></td>
                        <td><a href="{{route('igif.admin.courses.edit', $card->course_id)}}">{{$card->course->course_name}}</a></td>
                        <td>{{$card->tee_color}}</td>
                        <td>{{$card->course_par_for_tee}}</td>
                        <td>{{$card->rating}} / {{$card->slope}}</td>
                        <td>
                            <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Course"></i></a>
                            <a href="{{route('igif.admin.scorecards.edit', $card->id)}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit" title="Edit Course"></i></a>

                        </td>
                        {{--<td>{{$card->created_at->diffForHumans()}}</td>--}}
                        {{--<td>{{$card->updated_at->diffForHumans()}}</td>--}}

                    </tr>

                @endforeach

            @endif

            </tbody>
        </table>
    </div>




@stop
