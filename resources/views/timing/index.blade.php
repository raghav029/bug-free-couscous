@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Time In Out</h1>
        </div>
            <div class="text-right">
                <!-- <a href="{{route('roomRentCreate')}}" class="btn btn-primary">Create</a> -->
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
                <table class="table table-stripped">
                    <tr>
                        <th>Name:</th>
                        <th>Email:</th>
                        <th>Room:</th>
                        <th>Status</th>
                    </tr>
                    
                    @foreach ($tenants as $key => $tenant)
                    <tr>
                        <td><a href="{{route('timeCreate', $tenant->tenant_id)}}">{{ $tenant->tenant_name }}</a></td>
                        <td>{{ $tenant->email }}</td>
                        <td>{{ $tenant->room_name }}</td>
                        @if(($tenant->time_in) == ($tenant->time_out))
                        <td>Tenant is in Hostel</td>
                        @else
                        <td>Tenant is Out</td>
                        @endif
                    </tr>
                    @endforeach
                </table>
                </div>
        <div>
        </div>
    </div>
</div>
@endsection