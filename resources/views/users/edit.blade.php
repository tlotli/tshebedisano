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
            <h4 class="panel-title">Edit User</h4>
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
        <form action="{{route('user.update' ,['id' => $user->id])}}" method="post">
            @csrf
            <div class="panel-body">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" name="firstname" value="{{$user->firstname}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" name="lastname" value="{{$user->lastname}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">User Role</label>
                            <select class="select2" class="form-control" name="role_id[]" data-placeholder="Select User Role...">

                                @foreach($role as $ro)
                                    <option value="{{$ro->id}}"
                                            @foreach($user->roles as $user_roles)
                                                @if($ro->id === $user_roles->pivot->role_id)
                                                    selected
                                                @endif
                                            @endforeach
                                    >{{$ro->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Repositories</label>
                            <select class="select2" name="repository_id[]" class="form-control" multiple data-placeholder="Select User Repositories...">
                                <option value=""></option>
                                @foreach($repositories as $re)
                                    <option value="{{$re->id}}"
                                            @foreach($user->repositories as $user_repo)
                                                    @if($user_repo->pivot->repository_id == $re->id)
                                                        selected
                                                    @endif
                                            @endforeach
                                    >{{$re->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-success">Update</button>
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




