@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rents - Create</h1>
        </div>
            <div class="text-right">
                <!-- <a href="{{route('billCreate')}}" class="btn btn-primary">Create</a> -->
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
                <form action="{{ route('roomRentStore') }}" method="POST">
                {{ csrf_field() }}

                    {!! Form::label('room_id', 'Room') !!}
                    {!! Form::select('room_id', $room, null,['class'=> 'form-control']) !!}
                    
                    {!! Form::label('rent', 'rent') !!}
                    {!! Form::text('rent', $rooms[0]->rent, ['class'=> 'form-control']) !!}
                    
                    {!! Form::label('utilities', 'Utilities') !!}
                    {!! Form::text('utilities', '', ['class'=> 'form-control']) !!}
                    
                    {!! Form::label('discount', 'discount') !!}
                    {!! Form::text('discount', '', ['class'=> 'form-control']) !!}
                    
                    {!! Form::Label('description', 'Description:') !!}
                    {!! Form::textarea('description', '', ['class'=> 'form-control']) !!}
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-warning">clear</button>
                    <a href="{{ route('roomBills') }}" class="btn btn-info">Back</a>
                </form>
            </div>
        <div>
        </div>
    </div>
</div>
@endsection
