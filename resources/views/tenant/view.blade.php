@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Profile & History</h3>
            <div class="text-right">
                <!-- <a href="{{route('tenantCreate')}}" class="btn btn-primary">Create</a> -->
            </div>
            <br>

            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                @endif
                {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', $tenant->name, ['class'=> 'form-control', 'disabled'=> true]) !!}
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', $tenant->email, ['class'=> 'form-control','disabled'=> true]) !!}
                        
                        {!! Form::label('phone', 'Phone:') !!}
                        {!! Form::text('phone', $tenant->phone, ['class'=> 'form-control','disabled'=> true]) !!}
                        
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description', $tenant->description, ['class'=> 'form-control','disabled'=> true]) !!}
                       <hr>
                <div class="container-fluid">
                <h3> Times </h3>
                <table class="table table-stripped">
                    <tr>
                    <th>Name:</th>
                    <th>Email:</th>
                    </tr>
                    @foreach($tenant_timing as $time)
                    <tr>
                    <td>
                        @if($time->is_active == 0)
                            Tenant was In Hostel
                        @else
                            Tenant was out of Hostel
                        @endif
                        </td>

                        <td>{{ $time->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
                </div>
                <div class="container-fluid">
                <h3> Payments </h3>
                <table class="table table-stripped">
                    <tr>
                    <th>Amount:</th>
                    <th>Date:</th>
                    <th>Status</th>
                    </tr>
                    @foreach($payments as $pay)
                    <tr>
                        <td>{{ $pay->amount }}</td>
                        <td>{{ $pay->created_at }}</td>
                        <td>
                        @if($pay->is_paid == 0)
                            Not Paid
                        @else
                            Paid
                        @endif
                        </td>
                    </tr>

                    @endforeach
                </table>
                </div>
                </div>
        </div>
    </div>
</div>
@endsection
