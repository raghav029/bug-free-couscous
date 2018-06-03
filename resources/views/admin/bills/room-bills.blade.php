@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Room Bills</h1>
        </div>
            <div class="text-right">
                <a href="{{route('roomRentCreate')}}" class="btn btn-primary">Create</a>
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
                        <th>Type</th>
                        <th>Description</th>
                        <th>Rent</th>
                        <th>utilities</th>
                        <th>discount</th>
                        <th>Total</th>
                        <th>Created</th>
                        <th>Divide</th>
                    </tr>
                    @forelse($roomBills as $expense)
                        <tr>
                            <td>{{ $expense->name }}</td>
                            <td>{{ $expense->description}}</td>
                            <td>{{ $expense->rent}}</td>
                            <td>{{ $expense->utilities}}</td>
                            <td>{{ $expense->discount}}</td>
                            <td>{{ $expense->total}}</td>
                            <td>{{ $expense->created_at}}</td>
                            <td>
                            <a href="{{ route('billDisperseTenant', $expense->id) }}"><i class="fa fa-plus"></i></a>
                            <!-- <a href="{{ route('billView', $expense->id) }}"><i class="fa fa-eye"></i></a> -->
                            </td>
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
@endsection
