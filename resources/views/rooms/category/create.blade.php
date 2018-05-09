@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Room Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('roomCatStore') }}" method="POST">
                {{ csrf_field() }}
                {!! Form::label('name', 'Category name:') !!}
                {!! Form::text('name', '', ['class'=> 'form-control']) !!}
                
                {!! Form::label('description', 'Category Description:') !!}
                {!! Form::textarea('description', '', ['class'=> 'form-control']) !!}
                {!! Form::hidden('is_active', 1, ['class'=> 'form-control']) !!}
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Clear</button>
                <a type="button" class="btn btn-danger" href="{{ route('roomCatIndex') }}">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
