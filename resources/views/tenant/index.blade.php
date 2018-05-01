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
                <table>
                    <tr>
                    <th>Name:</th>
                    <th>Email:</th>
                    <th>Phone:</th>
                    <th>Description:</th>
                    <th>Action:</th>
                    </tr>
                    @foreach ($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->name }}</td>
                        <td>{{ $tenant->email }}</td>
                        <td>{{ $tenant->phone }}</td>
                        <td>{{ $tenant->description }}</td>
                        <td>Edit | Delete</td>
                    </tr>
                    @endforeach
                </table>
                {{ $tenants->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
