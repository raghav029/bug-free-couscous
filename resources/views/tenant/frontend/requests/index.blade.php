@extends('layouts_tenant.app')

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
                @if(Session::has('success'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                @endif
                <table class="table table-stripped">
                    <tr>
                    <th>Request Type:</th>
                    <th>Description:</th>
                    <th>Date:</th>
                    <th>Status:</th>
                    </tr>
                @foreach($request_types as $requests)
                    <tr>
                        <td> {{ $requests->requestsType->request_name }} </td>
                        <td> {{ $requests->description }} </td>
                        <td> {{ $requests->created_at }} </td>
                        @if($requests->status == 0)
                        <td>Pending</td>
                        @else
                        <td>Done</td>
                        @endif
                    </tr>
                @endforeach
                </table>
                
                </div>
            </div>
        </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<!-- <div class="container">
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
                Tenant Dashboard    
                </table>
                
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
