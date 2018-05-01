@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <table>
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
                        <td>Edit | Delete</td>
                    </tr>
                    @endforeach
                </table>
                {{ $allocatedRooms->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
