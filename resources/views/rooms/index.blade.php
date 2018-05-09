@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Rooms</h3>
            <div class="text-right">
                <a href="{{route('roomCreate')}}" class="btn btn-primary">Create</a>
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
                    <th>Number:</th>
                    <th>Description:</th>
                    <th>Action:</th>
                    </tr>
                    @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->number }}</td>
                        <td>{{ $room->description }}</td>
                        <td>
                            
                        <a href="{{ route('roomEdit', $room->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{{ route('roomDelete', $room->id)}}"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $rooms->links() }}
                </div>
                </div>
    </div>
</div>
@endsection
