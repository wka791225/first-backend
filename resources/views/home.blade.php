@extends('layouts.app')

@section('content')s
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">dacadcad
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}123
                        {{ session('status') }}555555
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
