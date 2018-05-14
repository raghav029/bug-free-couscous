@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Room Allocation</h1>
            <div class="text-right">
                <a href="{{route('roomAllocationCreate')}}" class="btn btn-primary">Create</a>
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
                    <th>Tenant Name:</th>
                    <th>Room Number:</th>
                    <th>Description:</th>
                    <th>Action:</th>
                    </tr>
                    @foreach ($allocatedRooms as $allocation)
                    <tr>
                        <td>{{ $allocation->tenant_name }}</td>
                        <td>{{ $allocation->room_name }}</td>
                        <td>{{ $allocation->description }}</td>
                        <td>
                        <a href="{{ route('roomAllocationEdit', $allocation->id) }}"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('roomAllocationDelete', $allocation->id) }}"><i class="fa fa-times-circle"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $allocatedRooms->links() }}
                </div>
                <div>
        </div>
    </div>
</div>
@endsection
