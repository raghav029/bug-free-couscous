@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rents</h1>
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
            <ul class="nav nav-tabs">
                <li class="active"><a href="#ready_to_divide">Ready to Divide Rent</a></li>
                <li><a href="#waiting_for_rent">Already rented</a></li>
            </ul>
            <div id="ready_to_divide">
                <table class="table table-stripped">
                    <tr>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Description</th>
                        <th>Rent</th>
                        <th>Days to Rent:</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->number }}</td>
                        <td>{{ $room->description }}</td>
                        <td>{{ $room->rent }}</td>
                        <td>{{ $room->created_at }}</td>
                        <td>
                        <a href="{{ route('rentView', ['id'=> $room->id, 'room_id'=>$room->room_id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            <div id="waiting_for_rent">
            test
            </div>
            </div>
        <div>
        </div>
    </div>
</div>
@endsection
