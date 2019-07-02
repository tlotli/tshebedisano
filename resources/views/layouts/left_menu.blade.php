<div class="leftpanelinner">
    <!-- This is only visible to small devices -->
    <div class="visible-xs hidden-sm hidden-md hidden-lg">
        {{--<div class="media userlogged">--}}
            {{--<img alt="" src="{{asset('images/photos/loggeduser.png')}}" class="media-object">--}}
            {{--<div class="media-body">--}}
                {{--<h4>{{\Illuminate\Support\Facades\Auth::user()->firstname . ' ' . \Illuminate\Support\Facades\Auth::user()->lastname}}</h4>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<h5 class="sidebartitle actitle">Account</h5>--}}
        {{--<ul class="nav nav-pills nav-stacked nav-bracket mb30">--}}
            {{--<li>--}}
                {{--<a href="{{ route('logout') }}"--}}

                   {{--onclick="event.preventDefault();--}}
                            {{--document.getElementById('logout-form1').submit();"--}}

                {{--><i class="fa fa-lock"></i> <span>Logout</span></a>--}}

                {{--<form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                    {{--@csrf--}}
                {{--</form>--}}


            {{--</li>--}}
        {{--</ul>--}}
    </div>

    <h5 class="sidebartitle">Menu</h5>
    <ul class="nav nav-pills nav-stacked nav-bracket">

        <li class="nav-parent"><a href=""><i class="fa fa-folder"></i> <span>Documents</span></a>
            <ul class="children">
                @can('files.view' , \Illuminate\Support\Facades\Auth::user() )
                    <li><a href="{{route('home')}}"><i class="fa fa-archive"></i> <span>Manage Documents</span></a></li>
                @endcan

                @can('files.restore' , \Illuminate\Support\Facades\Auth::user() )
                    <li><a href="{{route('deleted_files')}}"><i class="fa fa-recycle"></i> <span>Restore Documents</span></a></li>
                @endcan
            </ul>
        </li>

        <li class="nav-parent"><a href=""><i class="fa fa-folder"></i> <span>Manage Repositories</span></a>
            <ul class="children">
                @can('repository.view' , \Illuminate\Support\Facades\Auth::user() )
                    <li><a href="{{route('repositories.index')}}"><i class="fa fa-caret-right"></i> Repositories</a></li>
                @endcan
            </ul>
        </li>


        <li class="nav-parent"><a href=""><i class="fa fa-users"></i> <span>User Management</span></a>
            <ul class="children">
                @can('users.view' , \Illuminate\Support\Facades\Auth::user() )
                    <li><a href="{{route('user.index')}}"><i class="fa fa-caret-right"></i> Users</a></li>
                @endcan

                @can('roles.view' , \Illuminate\Support\Facades\Auth::user() )
                    <li><a href="{{route('roles.index')}}"><i class="fa fa-caret-right"></i> Roles</a></li>
                @endcan
            </ul>
        </li>


        @can('logs.view' , \Illuminate\Support\Facades\Auth::user() )
            <li class=""><a href="{{route('logs')}}"><i class="fa fa-clipboard"></i> <span>Logs</span></a></li>
        @endcan

    </ul>
</div><!-- leftpanelinner -->