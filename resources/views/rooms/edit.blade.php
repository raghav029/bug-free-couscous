@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Room</h1>
        </div>
                <div class="card-body">
                @foreach (['danger', 'warning', 'success', 'error','info'] as $key)
                @if(Session::has($key))
                    <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                @endif
                @endforeach
                    <form action="{{ route('roomUpdate') }}" method="POST">
                    {{ csrf_field() }}
                    {!! Form::hidden('id', $room->id) !!}
                        {!! Form::Label('name', 'Room name:') !!}
                        {!! Form::text('name', $room->name, ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('room_number', 'Room number:') !!}
                        {!! Form::text('number', $room->number, ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('description', 'Description:') !!}
                        {!! Form::textarea('description', $room->description, ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('strength', 'Room Strength:') !!}
                        {!! Form::number('strength', $room->strength, ['class'=> 'form-control']) !!}
                        
                        
                        {!! Form::Label('roomsCategory', 'Room Category:') !!}
                        {!! Form::select('room_category_id', $roomsCategory, $roomsCategory, ['class' => 'form-control']) !!}
                        
                        {!! Form::Label('rent', 'Rent:') !!}
                        {!! Form::number('rent', $room->rent, ['class' => 'form-control']) !!}
                        
                        @if($room->is_active == 1)
                            Active: {!! Form::radio('is_active', 1, true) !!}
                            Inactive:{!! Form::radio('is_active',0) !!}
                        @elseif($room->is_active != 1)
                            Active: {!! Form::radio('is_active', 1) !!}
                            Inactive:{!! Form::radio('is_active',0, true) !!}
                        @endif
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-warning">Clear</button>
                        <a type="button" class="btn btn-danger" href="{{ route('roomIndex') }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
