@extends('layouts.app')

@section('main-styles')
    <link href="{{asset('css/jquery.datatables.css')}}" rel="stylesheet">
@endsection

@section('main-section')
    <div class="contentpanel">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="results-list">
                            @foreach($files as $f)
                                <div class="media">
                                    <a href="{{ Storage::disk('local')->url('public/documents/'.$f->location) }}" class="pull-left">
                                        <i class="fa fa-file-pdf-o" style="font-size: 30px; color : red"></i>
                                    </a>
                                    <div class="media-body">

                                        <h4 class="filename text-primary"><a href="{{ Storage::disk('local')->url('public/documents/'.$f->location) }}">{{$f->name}}</a></h4>
                                        <small class="text-muted">Policy Number: {{$f->policy_number}}</small><br>
                                        <small class="text-muted">Created: {{$f->created_at}}</small><br>
                                        <small class="text-muted">Modified: {{$f->updated_at}}</small>

                                        <form id="restore-document-{{$f->id}}" method="post" action="{{route('restore_files' , ['id' => $f->id])}}" style="display: none">
                                            {{csrf_field()}}
                                        </form>

                                        <a href="" class="pull-right" style="color:green"
                                           onclick="if(confirm('Are you sure you want to restore document ?')) {
                                                   event.preventDefault(); document.getElementById('restore-document-{{$f->id}}').submit();
                                                   }
                                                   else{event.preventDefault();
                                                   }"
                                        ><i class="fa fa-recycle"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div><!-- results-list -->
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-sm-8 -->
        </div><!-- row -->
    </div>
@endsection