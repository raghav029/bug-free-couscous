@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Rooms Category</h3>
            <div class="text-right">
                <a href="{{route('roomCatCreate')}}" class="btn btn-primary">Create</a>
            </div>
            <br>
            <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em>
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-error">
                    <span class="glyphicon glyphicon-warning-sign"></span><em> {!! session('error') !!}</em>
                </div>
            @endif
                <table class="table table-stripped">
                    <tr>
                    <th>Name:</th>
                    <th>Number:</th>
                    <th>Action:</th>
                    </tr>
                    @foreach ($roomCategories as $roomCate)
                    <tr>
                        <td>{{ $roomCate->name }}</td>
                        <td>{{ $roomCate->is_active }}</td>
                        <td>
                            
                        <a href="{{ route('roomCatEdit', $roomCate->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{{ route('roomCatDelete', $roomCate->id)}}"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $roomCategories->links() }}
                </div>
        </div>
    </div>
</div>

@endsection
