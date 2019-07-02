@extends('layouts.app')
@section('main-section')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Add New Permission</h4>
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
        <form action="{{route('permissions.update' ,['id' => $permission->id])}}" method="post">
            @csrf
            {{method_field('PUT')}}
            <div class="panel-body">
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Permission Name</label>
                            <input type="text" name="name" value="{{$permission->name}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Permission Type</label>
                            <select name="permission_type" class="form-control" id="">

                                @if($permission->permission_type == 'User')
                                 <option value="User" selected>User</option>
                                @endif

                                @if($permission->permission_type == 'Repositories')
                                    <option value="Repositories" selected>Repositories</option>
                                @endif

                                    @if($permission->permission_type == 'Role')
                                        <option value="Role" selected>Role</option>
                                    @endif

                                @if($permission->permission_type == 'Permission')
                                        <option value="Permission" selected>Permission</option>
                                @endif

                                @if($permission->permission_type == 'Contact')
                                        <option value="Contact" selected>Contact</option>
                                @endif

                                @if($permission->permission_type == 'Document')
                                        <option value="Document" selected>Document</option>
                                @endif

                                @if($permission->permission_type == 'Log')
                                    <option value="Log" selected>Log</option>
                                @endif

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer ">
                <button class="btn btn-success">Update</button>
                <a href="{{route('permissions.index')}}" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>
@endsection





