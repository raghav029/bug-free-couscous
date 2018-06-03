@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hostel Information</h1>
        </div>
        <br>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em>
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-error">
                    <span class="glyphicon glyphicon-warning-sign"></span><em> {!! session('error') !!}</em>
                </div>
            @endif
            <div class="card-body">
                
                <form method="POST" action="{{ route('settingUpdate') }}">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="hostel_name">Hostel Name:</label>
                        <input type="text" value="{{ $setting->hostel_name }}" name="hostel_name" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="country">country:</label>
                        <input type="text" value="{{ $setting->country }}" name="country" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" value="{{ $setting->state }}" name="state" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" value="{{ $setting->city }}" name="city" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" value="{{ $setting->address }}" name="address" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title:</label>
                        <input type="text" value="{{ $setting->meta_title }}" name="meta_title" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description:</label>
                        <input type="text" value="{{ $setting->meta_description }}" name="meta_description" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="owner_name">Owner Name:</label>
                        <input type="text" value="{{ $setting->owner_name }}" name="owner_name" class="form-control" disabled>
                    </div>

                    <button type="submit" class="btn btn-primary"  disabled>Submit</button>
                    <button type="submit" class="btn btn-warning" id="edit_settings">Edit</button>
                </form>
            </div>
        <div>
        </div>
    </div>
</div>
@endsection
