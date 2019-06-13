@extends('layouts.app')

@section('main-section')

    <div class="contentpanel">

        <ul class="letter-list">
            <li><a href="">a</a></li>
            <li><a href="">b</a></li>
            <li><a href="">c</a></li>
            <li><a href="">d</a></li>
            <li><a href="">e</a></li>
            <li><a href="">f</a></li>
            <li><a href="">g</a></li>
            <li><a href="">h</a></li>
            <li><a href="">i</a></li>
            <li><a href="">j</a></li>
            <li><a href="">k</a></li>
            <li><a href="">l</a></li>
            <li><a href="">m</a></li>
            <li><a href="">n</a></li>
            <li><a href="">o</a></li>
            <li><a href="">p</a></li>
            <li><a href="">q</a></li>
            <li><a href="">r</a></li>
            <li><a href="">s</a></li>
            <li><a href="">t</a></li>
            <li><a href="">u</a></li>
            <li><a href="">v</a></li>
            <li><a href="">w</a></li>
            <li><a href="">x</a></li>
            <li><a href="">y</a></li>
            <li><a href="">z</a></li>
        </ul>

        <div class="mb30"></div>
            <a href="{{route('contacts.create')}}" class="btn btn-primary btn-block">Add New Contact <i class="fa fa-plus"></i></a>
        <div class="mb30"></div>
        <div class="people-list">
            <div class="row">

                <div class="col-md-6">
                    <div class="people-item">
                        <div class="media">
                            <a href="#" class="pull-left">
                                <img alt="" src="images/photos/user2.png" class="thumbnail media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="person-name">Ray Sin</h4>
                                <div class="text-muted"><i class="fa fa-map-marker"></i> Cebu City, Philippines</div>
                                <div class="text-muted"><i class="fa fa-briefcase"></i> Software Engineer at <a href="">SomeCompany, Inc.</a></div>
                                <ul class="social-list">
                                    <li><a href="" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Email"><i class="fa fa-envelope-o"></i></a></li>
                                    <li><a href="" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- col-md-6 -->

            </div><!-- row -->
        </div><!-- people-list -->

    </div>



@endsection






