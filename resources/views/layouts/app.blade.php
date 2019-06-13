<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <title>GrandSpectrum Document Management System</title>
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    @yield('main-styles')
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
    <div class="leftpanel">
        <div class="logopanel">
            <h1><span>[</span> LEBO LOGO HERE <span>]</span></h1>
        </div><!-- logopanel -->

        <div class="leftpanelinner">
            <!-- This is only visible to small devices -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media userlogged">
                    <img alt="" src="images/photos/loggeduser.png" class="media-object">
                    <div class="media-body">
                        <h4>Add Auth Name here</h4>
                    </div>
                </div>
                <h5 class="sidebartitle actitle">Account</h5>
                <ul class="nav nav-pills nav-stacked nav-bracket mb30">
                    <li><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="email.html"><span class="pull-right badge badge-success">2</span><i class="fa fa-envelope-o"></i> <span>Email</span></a></li>
                </ul>
            </div>

            <h5 class="sidebartitle">Navigation Big</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket">
                <li><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="email.html"><span class="pull-right badge badge-success">2</span><i class="fa fa-envelope-o"></i> <span>Email</span></a></li>
            </ul>
        </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->
    <div class="mainpanel">
        <div class="headerbar">
            <a class="menutoggle"><i class="fa fa-bars"></i></a>
            <div class="header-right">
                <ul class="headermenu">
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <img src="images/photos/loggeduser.png" alt="" />
                                John Doe
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                                <li><a href="signin.html"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div><!-- header-right -->
        </div><!-- headerbar -->

        <div class="pageheader">
            <h2><i class="fa fa-home"></i> Blank Page </h2>
        </div>
        <div class="contentpanel">
            @yield('main-section')
        </div>
    </div>
</section>

<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/modernizr.min.js')}}"></script>
<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('js/toggles.min.js')}}"></script>
<script src="{{asset('js/retina.min.js')}}"></script>
<script src="{{asset('js/jquery.cookies.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>

@yield('custom-scripts')


<script>
    @if(Session::has('success'))
    toastr.success('{{Session::get('success')}}');
    @endif

    @if(Session::has('info'))
    toastr.info('{{Session::get('info')}}');
    @endif

    @if(Session::has('warning'))
    toastr.warning('{{Session::get('warning')}}');
    @endif

    @if(Session::has('danger'))
    toastr.warning('{{Session::get('danger')}}');
    @endif
</script>

</body>
</html>
