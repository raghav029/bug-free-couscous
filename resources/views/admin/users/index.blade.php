@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admins</h1>
            <div class="text-right">
                <a href="{{route('register')}}" class="btn btn-primary">Create</a>
            </div>
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
                        <th>National Number:</th>
                        <th>Status</th>
                    </tr>
                    @foreach($administrators as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>{{ $admin->national_number }}</td>
                        <td>
                            <a href="{{ route('administratorEdit', $admin->id) }}"><span class="glyphicon glyphicon-edit "></span></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        <div>
        </div>
    </div>
</div>
@endsection
