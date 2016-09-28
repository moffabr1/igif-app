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
                <td colspan="10" align="right">add club: <a href="{{route('igif.admin.clubs.create')}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Club"></i></a></td>
            </tr>
            <tr>
                <th>Id</th>
                <th>Club Name</th>
                <th>Holes</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>

            @if($clubs)

                @foreach($clubs->sortBy('club_name') as $club)

                    <tr>
                        <td>{{$club->id}}</td>
                        <td><a href="{{route('igif.admin.clubs.edit', $club->id)}}">{{$club->club_name}}</a></td>
                        {{--<td><a href="{{route('igif.admin.courses.edit', $course->id)}}">{{$course->course_name}}</a></td>--}}
                        <td>{{$club->number_of_holes}}</td>
                        <td>{{$club->address}}, {{$club->city_name}}, {{$club->state_province_name}} {{$club->postal_code}}, {{$club->country_name}}</td>
                        <td>
                            <a href="#" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Club"></i></a>
                            <a href="{{route('igif.admin.clubs.edit', $club->id)}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit" title="Edit Club"></i></a>

                        </td>
                        <td>{{$club->created_at->diffForHumans()}}</td>
                        <td>{{$club->updated_at->diffForHumans()}}</td>

                    </tr>

                @endforeach

            @endif

            </tbody>
        </table>
    </div>






@stop
