@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Reports - Rent</h3>
            <div class="car-body">
                <form>
                <div class="form-group row">
                <!-- <div class="col-xs-3">
                    <label>Filters</label>
                    <input type="text" class="form-control" name="query">
                </div> -->
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
                <a href="{{ route('export') }}">Export</a>
                <!-- <a href="{{route('roomCreate')}}" class="btn btn-primary">Create</a> -->
                
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
                    <th>Room Name:</th>
                    <th>Rent:</th>
                    <th>Utilities:</th>
                    <th>Discount:</th>
                    <th>Total:</th>
                    <th>Description:</th>
                    <th>Divide:</th>
                    <th>Date:</th>
                    </tr>
                @foreach($roomBills as $rev)
                    <tr>
                        <td>{{ $rev->room->name }}</td>
                        <td>{{ $rev->rent }}</td>
                        <td>{{ $rev->utilities }}</td>
                        <td>{{ $rev->discount }}</td>
                        <td> {{ $rev->total}}</td>
                        <td> {{ $rev->description}}</td>
                        <td> {{ $rev->is_divide}}</td>
                        <td> {{ $rev->created_at}}</td>
                    </tr>
                @endforeach
                </table>
                
                </div>
                </div>
    </div>
</div>
@endsection
