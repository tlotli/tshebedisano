
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <title>Grand SharePoint</title>
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="signin">

<section>

    <div class="signinpanel">
        <div class="row">
            <div class="col-md-7">
                <div class="signin-info">
                    <div class="logopanel">
                        <img src="{{asset('images/logo.jpg')}}" style="border-radius: 5%" alt="" width="250px" height="250px">
                    </div><!-- logopanel -->
                    <div class="mb20"></div>
                    <h5><strong>Welcome to Tshebedisano Document Management Repository!</strong></h5>
                    <ul>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Manage Your Documents</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Access Your Documents From Anywhere</li>
                    </ul>
                    <div class="mb20"></div>
                </div><!-- signin0-info -->

            </div><!-- col-sm-7 -->

            <div class="col-md-5">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <form form method="POST" action="{{ route('login') }}" >
                    <h4 class="nomargin">Sign In</h4>
                        @csrf
                        <input type="email" name="email" class="form-control uname" value="{{ old('email') }}"  placeholder="Email" />
                        <input type="password" class="form-control pword" name="password"  placeholder="Password" />
                        <a href=""><small>Forgot Your Password?</small></a>
                        <button class="btn btn-success btn-block">Sign In</button>
                </form>
            </div><!-- col-sm-5 -->

        </div><!-- row -->

        <div class="signup-footer">
            <div class="pull-left">
                &copy; {{\Carbon\Carbon::now()->year}}. All Rights Reserved. Grand Sharepoint Document Management System
            </div>
            <div class="pull-right">
                Created By: <a href="" target="_blank">GrandSpectrum</a>
            </div>
        </div>

    </div><!-- signin -->

</section>


<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/modernizr.min.js')}}"></script>
<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('js/jquery.cookies.js')}}"></script>

<script src="{{asset('js/toggles.min.js')}}"></script>
<script src="{{asset('js/retina.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>
<script>
    jQuery(document).ready(function(){

        // Please do not use the code below
        // This is for demo purposes only
        var c = jQuery.cookie('change-skin');
        if (c && c == 'greyjoy') {
            jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
        } else if(c && c == 'dodgerblue') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        } else if (c && c == 'katniss') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        }
    });
</script>

</body>
</html>
