@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{ route('timeStore') }}" method="POST">
                    {{ csrf_field() }}
                        {{ Form::hidden('id', $tenant->id) }}
                        {{ Form::hidden('tenant_id', $tenant->tenant_id) }}    
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', $tenant->tenant_name, ['class'=> 'form-control', 'readonly' => 'true']) !!}
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', $tenant->email, ['class'=> 'form-control', 'readonly' => 'true']) !!}
                        
                        {!! Form::label('room_name', 'Room:') !!}
                        {!! Form::text('room_name', $tenant->room_name, ['class'=> 'form-control', 'readonly' => 'true']) !!}
                         
                        {!! Form::label('status', 'Status') !!}
                        @if(($tenant->created_at) == ($tenant->updated_at))
                        {!! Form::text('status', 'in', ['class'=> 'form-control', 'placeholder'=>'Tenant is IN','readonly' => 'true']) !!}
                        @else
                        {!! Form::text('status', 'out', ['class'=> 'form-control','placeholder'=>'Tenant is Out', 'readonly' => 'true']) !!}
                        @endif

                        {!! Form::label('timeCheck', 'Time') !!}
                        {!! Form::checkbox('timeCheck', '1', ['class'=> 'form-control', 'readonly' => 'true']) !!}
</br>
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
