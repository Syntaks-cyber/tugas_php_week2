@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="col-2">
                            <a href="{{url('/employee')}}" class="btn btn-success btn-sm" title="home CRUD">
                                    Masuk
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
