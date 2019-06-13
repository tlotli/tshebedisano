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
            <h4 class="panel-title">Add New User</h4>
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
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="panel-body">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" name="firstname" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">User Role</label>
                                <select class="select2" class="form-control" name="role_id[]" data-placeholder="Select User Role...">
                                    <option value=""></option>
                                    @foreach($role as $r)
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Repositories</label>
                            <select class="select2" name="repository_id[]" class="form-control" multiple data-placeholder="Select User Repositories...">
                                <option value=""></option>
                                @foreach($repositories as $r)
                                    <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Confirm Password</label>
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




