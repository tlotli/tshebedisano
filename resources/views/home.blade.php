@extends('layouts.app')

@section('main-styles')
    <link href="{{asset('css/jquery.datatables.css')}}" rel="stylesheet">
@endsection

@section('main-section')

    <div class="contentpanel">

        <div class="row">
            <div class="col-sm-12">
                <div class="row filemanager">

                    @foreach($get_repos as $g)
                        <div class="col-xs-6 col-sm-4 col-md-3 document">
                            <div class="thmb">
                                <div class="btn-group fm-group" style="display: none;">
                                </div><!-- btn-group -->
                                <div class="thmb-prev">
                                    <img src="{{asset('images/photos/media-doc.png')}}" class="img-responsive" alt="">
                                </div>
                                <h2 class="fm-title text-bold"><a href="{{route('repository_files' , ['id' => $g->id])}}">{{$g->name}}</a></h2>
                                <small class="text-muted text-center">Added: {{$g->created_at}}</small>
                            </div><!-- thmb -->
                        </div><!-- col-xs-6 -->
                    @endforeach

                </div><!-- row -->
            </div><!-- col-sm-9 -->
        </div>
    </div>

@endsection





