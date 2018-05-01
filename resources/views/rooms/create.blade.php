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
                    <form action="{{ route('roomStore') }}" method="POST">
                    {{ csrf_field() }}
                        {!! Form::Label('name', 'Room name:') !!}
                        {!! Form::text('name', '', ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('room_number', 'Room number:') !!}
                        {!! Form::text('number', '', ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('description', 'Description:') !!}
                        {!! Form::textarea('description', '', ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('strength', 'Room Strength:') !!}
                        {!! Form::number('strength', '', ['class'=> 'form-control']) !!}
                        
                        
                        {!! Form::Label('roomsCategory', 'Room Category:') !!}
                        {!! Form::select('room_category_id', $roomsCategory, $roomsCategory, ['class' => 'form-control']) !!}
                        
                        
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
