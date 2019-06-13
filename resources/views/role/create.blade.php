@extends('layouts.app')
@section('main-section')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Add New Role</h4>
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
        <form action="{{route('roles.store')}}" method="post">
            @csrf
            {{method_field('POST')}}
            <div class="panel-body">
                <div class="row ">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Role Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-3 ">
                        <h5>User Permissions</h5>
                        @foreach($permissions->where('permission_type' , 'User') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}">
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-sm-4 col-md-3 ">
                        <h5>Contacts Permissions</h5>
                        @foreach($permissions->where('permission_type' , 'Contact') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}">
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-sm-4 col-md-3 ">
                        <h5>User Rights</h5>
                        @foreach($permissions->where('permission_type' , 'Permission') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}">
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-sm-4 col-md-3 ">
                        <h5>Upload Rights</h5>
                        @foreach($permissions->where('permission_type' , 'Upload') as $p)
                            <div class="checkbox block">
                                <label>
                                    <input type="checkbox" name="permission_id[]" value="{{$p->id}}">
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel-footer ">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection





