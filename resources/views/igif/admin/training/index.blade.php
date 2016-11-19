@extends('layouts.dashboard')
@section('page_heading','Admin: Training Drills')
@section('section')


    @if(Session::has('message'))
        <p class="{{session('message_style')}}">{{session('message')}}</p>
    @endif

    <div class="container">
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td colspan="2">
                        <div align="left">
                            {{--<form action="http://contactmgr.dev/contacts" class="navbar-form navbar-right" role="search">--}}
                            <form action="{{ route("igif.admin.training.index") }}" class="navbar-form navbar-right" role="search">
                                <div class="input-group">
                                    <input type="text" name="term" value="{{ Request::get("term") }}" class="form-control" placeholder="Search....." />
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                                </div>
                            </form>
                        </div>
                    </td>
                    {{--<td colspan="8" align="right">add club: <a href="{{route('igif.admin.clubs.create')}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus-sign" title="Add New Club"></i></a></td>--}}
                </tr>
                <tr>
                    <th>id</th>
                    <th>media</th>
                    <th>category</th>
                    <th>name</th>
                    <th>attempts</th>
                    <th>Distance</th>
                    <th>success Criteria</th>
                    <th>measurement</th>
                    <th>created</th>
                    <th>updated</th>

                </tr>
                </thead>
                <tbody>
                {{--*/ $media_path = '/training_media/' /*--}}
                @if($drills)

                        @foreach($drills->sortBy('id') as $drill)

                        <tr>
                            <td>{{$drill->id}}</td>
                            <td><img height="50" src="{{$drill->media ? $media_path . $drill->media->file : 'http://placehold.it/140x100'}}" alt=""></td>
                            <td>{{$drill->category->name}}</td>
                            <td><a href="{{route('igif.admin.training.edit', $drill->id)}}">{{$drill->name}}</a></td>
                            <td>{{$drill->default_attempts}}</td>
                            <td>{{$drill->default_distance . ' ' . $drill->default_distance_unit }}</td>
                            <td>{{$drill->success_criteria}}</td>
                            <td>{{$drill->measurement_type}}</td>
                            <td>{{ ($drill->created_at != null) ? $drill->created_at->diffForHumans() : "No Date" }}</td>
                            <td>{{ ($drill->updated_at != null) ? $drill->updated_at->diffForHumans() : "No Date" }}</td>


                        </tr>

                    @endforeach

                @endif

                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <nav>
            {{--{!! $contacts->links() !!}--}}
            {{--{!! $clubs->appends( Request::query())->render() !!}--}}
        </nav>
    </div>




@stop
