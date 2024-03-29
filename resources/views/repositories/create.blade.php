@extends('layouts.app')
@section('main-section')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Add New Repository</h4>
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
        <form action="{{route('repositories.store')}}" method="post">
            @csrf
            {{method_field('POST')}}
            <div class="panel-body">
                <div class="row ">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Repository Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer ">
                <button class="btn btn-primary">Create</button>
                <a href="{{route('repositories.index')}}" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>
@endsection





