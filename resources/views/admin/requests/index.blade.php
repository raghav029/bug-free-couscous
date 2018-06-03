@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Requests</h1>
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
                        <th>Request Type</th>
                        <th>Request Description</th>
                        <th>Tenant Name</th>
                        <th>Requested Date</th>
                        <th>Status</th>
                    </tr>
                    @foreach($requests as $request)
                    <tr>
                        <td>{{$request->request_name}}</td>
                        <td>{{$request->request_description}}</td>
                        <td>{{$request->name}}</td>
                        <td>{{$request->created_at}}</td>
                        <td> 
                        <a href="{{ route('requestView', $request->id) }}"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('requestView', $request->id) }}"><i class="fa fa-times-circle"></i></a>
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
