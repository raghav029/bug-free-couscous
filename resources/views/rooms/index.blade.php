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
                    <th>Name:</th>
                    <th>Number:</th>
                    <th>Action:</th>
                    </tr>
                    @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->number }}</td>
                        <td>Edit | Delete</td>
                    </tr>
                    @endforeach
                </table>
                {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
