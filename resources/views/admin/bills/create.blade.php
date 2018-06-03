@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bills - Create</h1>
        </div>
                <div class="card-body">
                @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                    <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                @endif
                @endforeach
                    <form action="{{ route('billStore') }}" method="POST">
                    {{ csrf_field() }}
                        {!! Form::Label('bill_type', 'Bill Type:') !!}
                        {!! Form::text('bill_type', '', ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('description', 'Description:') !!}
                        {!! Form::textarea('description', '', ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('amount', 'Amount:') !!}
                        {!! Form::number('amount', '', ['class'=> 'form-control']) !!}
                        
                        <br>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="reset" class="btn btn-warning">Clear</button>
                        <a type="button" class="btn btn-danger" href="{{ route('billIndex') }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
