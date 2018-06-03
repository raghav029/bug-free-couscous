@extends('layouts_tenant.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profile</h1>
        </div>
                <div class="card-body">
                @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                    <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                @endif
                @endforeach
                
                    <form action="{{ route('tenantProfileUpdate') }}" method="POST">
                    {{ csrf_field() }}

                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', $profile->name, ['class'=> 'form-control']) !!}
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', $profile->email, ['class'=> 'form-control']) !!}
                        
                        {!! Form::label('phone', 'Phone:') !!}
                        {!! Form::text('phone', $profile->phone, ['class'=> 'form-control']) !!}
                        
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description', $profile->description, ['class'=> 'form-control']) !!}
                        
                        
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Clear</button>
                        <a type="button" class="btn btn-danger" href="{{ route('roomIndex') }}">Back</a>
                    </form>
                    </div>
            </div>
        </div>
</div>
@endsection
