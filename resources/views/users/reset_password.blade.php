@extends('layouts.app')

@section('main-styles')
    <link rel="stylesheet" href="{{asset('css/bootstrap-timepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/jquery.tagsinput.css')}}" />
    <link rel="stylesheet" href="{{asset('css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}" />
@endsection

@section('main-section')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Update User Password</h4>
        </div>
        <div class="col-md-12 container mt10">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <form action="{{route('update_user_password' , ['id' => $user->id])}}" method="post">
            @csrf
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Confirm New Password</label>
                            <input type="password"  name="password_confirmation" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary">Submit</button>
                <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>
@endsection

@section('custom-scripts')
    <script src="{{asset('js/jquery.autogrow-textarea.js')}}"></script>
    <script src="{{asset('js/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('js/jquery.tagsinput.min.js')}}"></script>
    <script src="{{asset('js/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/dropzone.min.js')}}"></script>
    <script src="{{asset('js/colorpicker.js')}}"></script>

    <script>
        jQuery(document).ready(function(){
            "use strict";
            // Tags Input
            jQuery('#tags').tagsInput({width:'auto'});
            // Select2
            jQuery(".select2").select2({
                width: '100%'
            });
        });
    </script>
@endsection




