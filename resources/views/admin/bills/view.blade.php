@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bill View</h1>
        </div>
        <div class="text-right"></div>
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
                    <form action="{{ route('billStore') }}" method="POST">
                    {{ csrf_field() }}
                        {!! Form::Label('bill_type', 'Bill Type:') !!}
                        {!! Form::text('bill_type', $bill->bill_type, ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('description', 'Description:') !!}
                        {!! Form::textarea('description',$bill->description, ['class'=> 'form-control']) !!}
                        
                        {!! Form::Label('amount', 'Amount:') !!}
                        {!! Form::number('amount', $bill->amount, ['class'=> 'form-control']) !!}
                        
                        <br>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a type="button" class="btn btn-warning" href="{{ route('billDisperse', $bill->id) }}">Disperse</button>
                        <a type="button" class="btn btn-danger" href="{{ route('billIndex') }}">Back</a>
                    </form>
            </div>
        </div>
</div>
@endsection
