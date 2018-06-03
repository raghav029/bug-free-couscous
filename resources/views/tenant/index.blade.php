@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Tenants</h3>
            <div class="text-right">
                <a href="{{route('tenantCreate')}}" class="btn btn-primary">Create</a>
            </div>
            <br>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                @endif
                <table class="table table-stripped">
                    <tr>
                    <th>Name:</th>
                    <th>Email:</th>
                    <th>Phone:</th>
                    <th>Description:</th>
                    <th>Action:</th>
                    </tr>
                    @foreach ($tenants as $tenant)
                    <tr>
                        <td><a href="{{ route('tenantView', $tenant->id) }}">{{ $tenant->name }}</a></td>
                        <td>{{ $tenant->email }}</td>
                        <td>{{ $tenant->phone }}</td>
                        <td>{{ $tenant->description }}</td>
                        <td>
                        <a href="{{ route('tenantEdit', $tenant->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{{ route('tenantDelete', $tenant->id)}}"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $tenants->links() }}
                </div>
        </div>
    </div>
</div>
@endsection
