@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Tenant</h1>
        </div>
                <div class="card-body">
                @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                <div class="alert alert-{{ $key }}">
                    <span class="glyphicon"></span><em> {{ Session::get($key) }}</em>
                    </div>
                @endif
                @endforeach
                    <form action="{{ route('tenantUpdate') }}" method="POST">
                    {{ csrf_field() }}
                        {!! Form::hidden('id', $tenant->id) !!}
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', $tenant->name, ['class'=> 'form-control']) !!}
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', $tenant->email, ['class'=> 'form-control']) !!}
                        
                        {!! Form::label('phone', 'Phone:') !!}
                        {!! Form::text('phone', $tenant->phone, ['class'=> 'form-control']) !!}
                        
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description', $tenant->description, ['class'=> 'form-control']) !!}
                        
                        
                        <!-- <input type="text" name="number"> -->
                        <!-- <label></label> -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a type="button" class="btn btn-danger" href="{{ route('tenantIndex') }}">Back</a>
                    </form>
                    </div>
            </div>
        </div>
</div>
@endsection
