@extends('layouts_tenant.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Payments</h1>
            <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                @endif
                <table class="table table-stripped">
                    <tr>
                    <th>Name:</th>
                    <th>Room:</th>
                    <th>Amount:</th>
                    <th>Status:</th>
                    
                    </tr>
                    @foreach($tenant_bills as $bill)
                    <tr>
                    <td>{{ session('tenant_name') }}</td>
                    <td>{{ $bill->room->name }}</td>
                    <td>{{ $bill->amount }}</td>
                    @if($bill->is_paid == 0)
                    <td>Pending</td>
                    @else
                    <td>Paid</td>
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
