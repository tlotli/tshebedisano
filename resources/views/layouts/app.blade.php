<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.style')
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
    <div class="leftpanel">
        <div class="logopanel">
            <h1><span> <img src="{{asset('images/logo.jpg')}}" style="border-radius: 5%" alt="" width="150px" height="100px"></span></h1>
        </div><!-- logopanel -->
     @include('layouts.left_menu')
    </div><!-- leftpanel -->
    <div class="mainpanel">
        <div class="headerbar">
            <a class="menutoggle"><i class="fa fa-bars"></i></a>
            <div class="header-right">
                <ul class="headermenu">
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{\Illuminate\Support\Facades\Auth::user()->firstname . ' ' . \Illuminate\Support\Facades\Auth::user()->lastname}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();
                                                "
                                    ><i class="glyphicon glyphicon-log-out"></i> Log Out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div><!-- header-right -->
        </div><!-- headerbar -->


        @include('layouts.header')


        <div class="contentpanel">
            @yield('main-section')
        </div>
    </div>
</section>

@include('layouts.scripts')

</body>
</html>
