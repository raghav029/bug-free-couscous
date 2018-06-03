@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Reports - Total Revenue</h3>
            <div class="car-body">
                <form>
                <div class="form-group row">
                <div class="col-xs-3">
                    <label>Filters</label>
                    <input type="text" class="form-control" name="query">
                </div>
                <div class="col-xs-3">
                    <label>To</label>
                <input type="date" class="form-control" name="start_date">
                </div>
                <div class="col-xs-3">
                    <label>End</label>
                <input type="date" class="form-control" name="end_date">
                </div>
                <div class="col-xs-3">
                <input class="btn btn-primary" type="submit" value="submit">
                </div>
                </div>
                </form>
                <a href="{{route('revenueExport')}}" class="btn btn-primary">Export</a>
                
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
                    <th>Type:</th>
                    <th>Amount:</th>
                    <th>Discount:</th>
                    <th>Description:</th>
                    <th>Tenant Name:</th>
                    <th>Date:</th>
                    </tr>
                @foreach($revenue as $rev)
                    <tr>
                        <td>{{ $rev->type }}</td>
                        <td>{{ $rev->amount }}</td>
                        <td>{{ $rev->discount }}</td>
                        <td>{{ $rev->description }}</td>
                        <td> {{ $rev->tenant->name}}</td>
                        <td> {{ $rev->created_at}}</td>
                    </tr>
                @endforeach
                </table>
                
                </div>
                </div>
    </div>
</div>
@endsection
