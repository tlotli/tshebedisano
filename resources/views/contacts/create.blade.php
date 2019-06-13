@extends('layouts.app')
@section('main-section')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Add New Contact</h4>
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
        <form action="{{route('contacts.store')}}" method="post">
            @csrf
            {{method_field('POST')}}
            <div class="panel-body">
                <div class="row ">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Contact Name</label>
                            <input type="text" name="company_contact" value="{{old('company_contact')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Company Name</label>
                            <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Company Telephone</label>
                            <input type="text" name="company_tel" value="{{old('company_tel')}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Company Fax</label>
                            <input type="text" name="company_fax" value="{{old('company_fax')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Company Email</label>
                            <input type="text" name="email" value="{{old('email')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Street Address</label>
                            <input type="text" name="street_address" value="{{old('street_address')}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">City</label>
                            <input type="text" name="city" value="{{old('city')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Province</label>
                            <input type="text" name="province" value="{{old('province')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Skype</label>
                            <input type="text" name="skype" value="{{old('skype')}}" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Facebook</label>
                            <input type="text" name="facebook" value="{{old('facebook')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Twitter</label>
                            <input type="text" name="twitter" value="{{old('twitter')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Linkedin</label>
                            <input type="text" name="linkedin" value="{{old('linkedin')}}" class="form-control">
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel-footer ">
                <button class="btn btn-primary">Create</button>
                <a href="{{route('contacts.index')}}" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>
@endsection





