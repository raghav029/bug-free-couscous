@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="{{ route('roomCatStore') }}" method="POST">
                    {{ csrf_field() }}
                        <label>Category name:</label>
                        <input type="text" name="name">
                        <label>Status:</label>
                        <input type="text" name="is_active">
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
