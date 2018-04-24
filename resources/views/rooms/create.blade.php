@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{ route('roomStore') }}" method="POST">
                    {{ csrf_field() }}
                        <label>Room name:</label>
                        <input type="text" name="name">
                        <label>Room number:</label>
                        <input type="text" name="number">
                        <!-- <input type="text" name="number"> -->
                        <!-- <label></label> -->
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
