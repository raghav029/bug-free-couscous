@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Reports - Tenants</h3>
            <div class="car-body">
                <form>
                    <label>Filters</label>
                <div class="form-group row">
                <div class="col-xs-3">
                    <input type="text" class="form-control" name="query">
                </div>
                <div class="col-xs-3">
                    <select class="form-control" name="tenant_status">
                        <option value="">Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                
                <div class="col-xs-3">
                <input class="btn btn-primary" type="submit" value="submit">
                </div>
                </div>
                </form>
                <a href="{{route('exportTenant')}}" class="btn btn-primary">Export</a>
                
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
                    <th>Phone:</th>
                    <th>Description:</th>
                    <th>Have Room:</th>
                    <th>Room:</th>
                    <th>Joining Date:</th>
                    <th>Status:</th>
                    </tr>
                @foreach($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->name }}</td>
                        <td>{{ $tenant->email }}</td>
                        <td>{{ $tenant->phone }}</td>
                        <td>{{ $tenant->description }}</td>
                        @if($tenant->room_allocation_status == 1)
                            <td>Have Room</td>
                        @else
                            <td>Do not have Room</td>
                        @endif
                        <td>{{ $tenant->rooms[0]->name }}</td>
                        <td>{{ $tenant->created_at }}</td>
                        @if($tenant->is_active == 1)
                        <td>Active</td>
                        @else
                        <td>Inactive</td>
                        @endif
                    </tr>
                @endforeach
                </table>
                
                </div>
                </div>
    </div>
</div>
@endsection
