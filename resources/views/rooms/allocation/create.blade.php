@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                    <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                @endif
                @endforeach
                    <form action="{{ route('roomAllocationStore') }}" method="POST">
                    {{ csrf_field() }}
                        {!! Form::Label('description', 'Description:') !!}
                        {!! Form::textarea('description', '', ['class'=> 'form-control']) !!}
                        
                        
                        {!! Form::label('tenant_id', 'Tenants:') !!}
                        {!! Form::select('tenant_id', $tenants, null,['placeholder' => 'Please select ...','class'=> 'form-control']) !!}
                        
                        {!! Form::label('room_category_id', 'Room Category:') !!}
                        {!! Form::select('room_category_id', $roomsCategory, null,['placeholder' => 'Please select ...','class'=> 'form-control']) !!}
                        
                        {!! Form::label('room', 'Room:') !!}
                        {!! Form::select('room_id', ['default'=>'Please select a room'], 'default',['class'=> 'form-control', 'id'=>'rooms_select']) !!}
                          
                        
                        Active: {!! Form::radio('is_active', 1, true) !!}
                        Inactive:{!! Form::radio('is_active',0) !!}
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
