@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Request View</h1>
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
                {!! Form::open(array('url'=>'test', 'method'=> 'post')) !!}
                {{ csrf_field() }}
                {!! Form::Label('tenant_name', 'Tenant Name:') !!}
                {!! Form::text('tenant_name', $request->tenant_name, ['class'=> 'form-control', 'disabled'=>true]) !!}
                        
                {!! Form::Label('room_name', 'Room Name:') !!}
                {!! Form::text('room_name', $request->room_name, ['class'=> 'form-control', 'disabled'=>true]) !!}

                {!! Form::Label('room_number', 'Room Number:') !!}
                {!! Form::text('room_number', $request->room_number, ['class'=> 'form-control', 'disabled'=>true]) !!}
                        
                {!! Form::Label('request_name', 'Request Name:') !!}
                {!! Form::text('request_name', $request->request_name, ['class'=> 'form-control', 'disabled'=>true]) !!}
                        
                {!! Form::Label('description', 'Description:') !!}
                {!! Form::textarea('description', $request->description, ['class'=> 'form-control', 'disabled'=>true]) !!}
                        
                
                {!! Form::Label('status', 'Action:') !!}
                {!! Form::select('status', [
                    'Pending', 'Approved', 'Rejected', 'In progress'
                ], null, ['class'=> 'form-control']) !!}
                        <br>
                {{Form::submit('Click Me!', ['class'=>'btn btn-primary'])}}

                {!! Form::close() !!}
            </div>
        <div>
        </div>
    </div>
</div>
@endsection
