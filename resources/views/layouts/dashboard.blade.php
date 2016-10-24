@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand" href="{{ url ('') }}">SB Admin v2.0 | Laravel 5</a>--}}
                <a class="navbar-brand" href="{{ url ('igif') }}">IGIF - Golf Improvement App</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                   
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'success', 'value'=>'40'))
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                   
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'info', 'value'=>'20'))
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'warning', 'value'=>'60'))
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    
                                        <div>
                                        @include('widgets.progress', array('animated'=> true,'class'=>'danger', 'value'=>'80'))
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif



                {{--<!-- /.dropdown -->--}}
                {{--<li class="dropdown">--}}
                    {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                        {{--<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu dropdown-user">--}}
                        {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        {{--<li><a href="{{ url ('login') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.dropdown-user -->--}}
                {{--</li>--}}
                {{--<!-- /.dropdown -->--}}


            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li {{ (Request::is('*igif') ? 'class="active"' : '') }}>
                            <a href="{{ url ('igif/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

<!-- /ADMIN Navigation -->
                    {{--@if($userData->role_id == 1)--}}

                        {{--<li >--}}
                            {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> Admin<span class="fa arrow"></span></a>--}}
                            {{--<ul class="nav nav-second-level">--}}
                                {{--<li {{ (Request::is('*admin') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('igif/admin/users') }}">Manage Users</a>--}}
                                {{--</li>--}}
                                {{--<li {{ (Request::is('*admin') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('igif/admin/users/create' ) }}">Create Users</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<!-- /.nav-second-level -->--}}
                        {{--</li>--}}

                    {{--@endif--}}
<!-- /END ADMIN Navigation -->
<!-- /ADMIN:COURSES Navigation -->

                        {{--<li >--}}
                            {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> Golf Courses<span class="fa arrow"></span></a>--}}
                            {{--<ul class="nav nav-second-level">--}}
                                {{--<li {{ (Request::is('*panels') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('panels') }}">Panels and Collapsibles</a>--}}
                                {{--</li>--}}
                                {{--<li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('buttons' ) }}">Buttons</a>--}}
                                {{--</li>--}}
                                {{--<li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url('notifications') }}">Alerts</a>--}}
                                {{--</li>--}}
                                {{--<li {{ (Request::is('*typography') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('typography') }}">Typography</a>--}}
                                {{--</li>--}}
                                {{--<li {{ (Request::is('*icons') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('icons') }}"> Icons</a>--}}
                                {{--</li>--}}
                                {{--<li {{ (Request::is('*grid') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('grid') }}">Grid</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<!-- /.nav-second-level -->--}}
                        {{--</li>--}}

<!-- /END ADMIN:COURSES Navigation -->

<!-- /ADMIN Navigation -->
                    @if($userData->role_id == 1)
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Admin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <!-- /ADMIN:USERS Navigation -->
                                <li>
                                    <a href="#">Users <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('igif/admin/users') }}">Manage Users</a>
                                        </li>
                                        <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('igif/admin/users/create' ) }}">Create Users</a>
                                        </li>
                                    </ul>
                                </li>
                            <!-- /END ADMIN:USERS Navigation -->
                            <!-- /ADMIN:CLUBS Navigation -->
                            <li>
                                <a href="#">Clubs <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('igif/admin/clubs') }}">Manage Clubs</a>
                                    </li>
                                    <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('igif/admin/clubs/create' ) }}">Create Club</a>
                                    </li>
                                    {{--<li {{ (Request::is('*admin') ? 'class="active"' : '') }}>--}}
                                        {{--<a href="{{ url ('igif/admin/courses') }}">Manage Courses</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                            <!-- /END ADMIN:CLUBS Navigation -->
                            <!-- /ADMIN:COURSES Navigation -->
                                <li>
                                    <a href="#">Courses <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        {{--<li {{ (Request::is('*admin') ? 'class="active"' : '') }}>--}}
                                            {{--<a href="{{ url ('igif/admin/clubs') }}">Manage Clubs</a>--}}
                                        {{--</li>--}}
                                        <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('igif/admin/courses') }}">Manage Courses</a>
                                        </li>
                                        <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('igif/admin/courses/create') }}">Create Courses</a>
                                        </li>
                                    </ul>
                                </li>
                            <!-- /END ADMIN:COURSES Navigation -->
                            <!-- /ADMIN:SCORECARDS Navigation -->
                                <li>
                                    <a href="#">Scorecards <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('igif/admin/scorecards') }}">Manage Scorecards</a>
                                        </li>
                                        <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('igif/admin/scorecards/create' ) }}">Create Scorecard</a>
                                        </li>
                                        {{--<li {{ (Request::is('*admin') ? 'class="active"' : '') }}>--}}
                                            {{--<a href="{{ url ('igif/admin/clubs/create' ) }}">Create Club</a>--}}
                                        {{--</li>--}}
                                    </ul>
                                </li>
                            <!-- /END ADMIN:SCORECARDS Navigation -->
                            </ul>
                        </li>
                    @endif
<!-- /END ADMIN Navigation -->

<!-- /PLAYER:SCORES Navigation -->
                        <li >
                            <a href="#"><i class="fa fa-pencil fa-fw"></i> Scores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/player/scores') }}">View Scores</a>
                                </li>
                                <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/player/scorecards' ) }}">View Scorecards</a>
                                </li>
                                <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/player/scores/create' ) }}">Enter Scores</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
<!-- /PLAYER:SCORES Navigation -->
<!-- /PLAYER:STATS Navigation -->
                        <li >
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Stats<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/player/stats') }}">View stats</a>
                                </li>
                                {{--<li {{ (Request::is('*admin') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('igif/player/scores/create' ) }}">Enter Scores</a>--}}
                                {{--</li>--}}
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
<!-- /PLAYER:STATS Navigation -->
                        <!-- /END ADMIN:SCORECARDS Navigation -->
                        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                            <a href="{{ url ('igif/charts') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                            <a href="{{ url ('igif/tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li {{ (Request::is('*forms') ? 'class="active"' : '') }}>
                            <a href="{{ url ('forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/panels') }}">Panels and Collapsibles</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/buttons' ) }}">Buttons</a>
                                </li>
                                <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                                    <a href="{{ url('igif/notifications') }}">Alerts</a>
                                </li>
                                <li {{ (Request::is('*typography') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/typography') }}">Typography</a>
                                </li>
                                <li {{ (Request::is('*icons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/icons') }}"> Icons</a>
                                </li>
                                <li {{ (Request::is('*grid') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/grid') }}">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('igif/blank') }}">Blank Page</a>
                                </li>
                                <li>
                                    <a href="{{ url ('login') }}">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
                            <a href="{{ url ('igif/documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

