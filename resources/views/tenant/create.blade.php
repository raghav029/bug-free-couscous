@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{ route('tenantStore') }}" method="POST">
                    {{ csrf_field() }}

                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', '', ['class'=> 'form-control']) !!}
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', '', ['class'=> 'form-control']) !!}
                        
                        {!! Form::label('phone', 'Phone:') !!}
                        {!! Form::text('phone', '', ['class'=> 'form-control']) !!}
                        
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description', '', ['class'=> 'form-control']) !!}
                        
                        
                        <!-- <input type="text" name="number"> -->
                        <!-- <label></label> -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
