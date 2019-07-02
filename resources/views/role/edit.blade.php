@extends('layouts.app')
@section('main-section')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Update Role</h4>
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
        <form action="{{route('roles.update' ,['id' => $role->id])}}" method="post">
            @csrf
            {{method_field('PUT')}}
            <div class="panel-body">
                <div class="row ">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Role Name</label>
                            <input type="text" name="name" value="{{$role->name}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-3 ">
                        <h5>User Permissions</h5>
                        @foreach($permissions->where('permission_type' , 'User') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}"
                                           @foreach($role->permissions as $role_permission)
                                               @if($p->id == $role_permission->pivot->permission_id)
                                                   checked
                                               @endif
                                           @endforeach
                                    >
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-sm-4 col-md-3 ">
                        <h5>Repository Permissions</h5>
                        @foreach($permissions->where('permission_type' , 'Repositories') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}"
                                           @foreach($role->permissions as $role_permission)
                                               @if($p->id == $role_permission->pivot->permission_id)
                                               checked
                                                @endif
                                            @endforeach
                                    >
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-sm-4 col-md-3 ">
                        <h5>Role Permissions</h5>
                        @foreach($permissions->where('permission_type' , 'Role') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}"
                                           @foreach($role->permissions as $role_permission)
                                               @if($p->id == $role_permission->pivot->permission_id)
                                               checked
                                                @endif
                                            @endforeach
                                    >
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-sm-4 col-md-3 ">
                        <h5>Document Upload Permissions</h5>
                        @foreach($permissions->where('permission_type' , 'Document') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}"
                                           @foreach($role->permissions as $role_permission)
                                               @if($p->id == $role_permission->pivot->permission_id)
                                               checked
                                                @endif
                                            @endforeach
                                    >
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>


                    <div class="col-sm-4 col-md-3 ">
                        <h5>Logs Permissions</h5>
                        @foreach($permissions->where('permission_type' , 'Logs') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}"
                                           @foreach($role->permissions as $role_permission)
                                           @if($p->id == $role_permission->pivot->permission_id)
                                           checked
                                            @endif
                                            @endforeach
                                    >
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
            <div class="panel-footer ">
                <button class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection





