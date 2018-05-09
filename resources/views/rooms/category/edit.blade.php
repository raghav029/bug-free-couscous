@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Edit Room Category</h3>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em>
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-error">
                    <span class="glyphicon glyphicon-warning-sign"></span><em> {!! session('error') !!}</em>
                </div>
            @endif
            <form action="{{ route('roomCatUpdate') }}" method="POST">
                {{ csrf_field() }}
                {!! Form::label('name', 'Category name:') !!}
                {!! Form::text('name', $roomsCategory->name, ['class'=> 'form-control']) !!}
                
                {!! Form::label('description', 'Category Description:') !!}
                {!! Form::textarea('description', $roomsCategory->description, ['class'=> 'form-control']) !!}
                {!! Form::hidden('id', $roomsCategory->id, ['class'=> 'form-control']) !!}
                
                {!! Form::label('is_active', 'Category Status:') !!}
                <select name="is_active" class="form-control">
                    @if($roomsCategory->is_active == 1)
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    @else
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    @endif
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
                <a type="button" class="btn btn-danger" href="{{ route('roomCatIndex') }}">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
