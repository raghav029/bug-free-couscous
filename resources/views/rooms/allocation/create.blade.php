@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Room Allocation</h1>
            <div class="text-right">
                <a href="{{route('roomAllocationCreate')}}" class="btn btn-primary">Create</a>
            </div>
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
