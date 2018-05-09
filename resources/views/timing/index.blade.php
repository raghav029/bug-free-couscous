@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                @endif
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
            </div>
        </div>
    </div>
</div>
@endsection