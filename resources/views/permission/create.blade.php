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
        <form action="{{route('permissions.store')}}" method="post">
            @csrf
            {{method_field('POST')}}
            <div class="panel-body">
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Permission Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Permission Type</label>
                            <select name="permission_type" class="form-control" id="">
                                <option value="User">User</option>
                                <option value="Repositories">Repositories</option>
                                <option value="Role">Role</option>
                                <option value="Permission">Permission</option>
                                <option value="Contact">Contact</option>
                                <option value="Document">Document</option>
                                <option value="Logs">Log</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel-footer ">
                <button class="btn btn-primary">Create</button>
                <a href="{{route('permissions.index')}}" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>
@endsection





