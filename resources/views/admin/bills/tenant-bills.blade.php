@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tenant Bills</h1>
        </div>
            <div class="text-right">
                
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
                        <th>Name</th>
                        <th>Room Name</th>
                        <th>Amount</th>
                        <th>Create Date:</th>
                        <th>Action</th>
                    </tr>
                    @forelse($tenants as $tenant)
                        <tr>
                            <td>{{ $tenant->tenant->name }}</td>
                            <td>{{ $tenant->room->name }}</td>
                            <td>{{ $tenant->amount }}</td>
                            <td>{{ $tenant->created_at }}</td>
                            <td><button class="btn btn-primary payments" id="{{ $tenant->id }}" data-toggle="modal" data-target="#myModal">Pay</button></td>
                        </tr>
                    @empty
                    <div class="alert alert-error">
                        <span class="glyphicon glyphicon-warning-sign"></span><em> No pending bills</em>
                    </div>  
                    @endforelse
                </table>
            </div>
        <div>
        </div>
    </div>
</div>


    <!-- Modal Start -->
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Payment</h4>
        </div>
        <div class="modal-body">
        <form id=>
        <div class="form-group">
        <label>Amount:</label>
        <input type="text" id="amount" class="form-control" value="" readonly>
        </div>
        <div class="form-group">
        <label>Discount:</label>
        <input type="text" class="form-control" id="discount" value="" >
        </div>
        <input type="hidden" id="tenant_id" value="" >
            
        </div>
        <div class="modal-footer">
            <button type="button" id="payment" class="btn btn-primary make_payment">Pay</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
    </div>
    <!-- Modal End -->

@endsection
