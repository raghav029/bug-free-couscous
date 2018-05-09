@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Room</h1>
        </div>
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
                        
                        {!! Form::Label('rent', 'Rent:') !!}
                        {!! Form::number('rent', '', ['class' => 'form-control']) !!}
                        
                        
                        Active: {!! Form::radio('is_active', 1, true) !!}
                        Inactive:{!! Form::radio('is_active',0) !!}
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
