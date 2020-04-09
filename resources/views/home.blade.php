@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in, {{ Auth::user()->name }}!</p>
                    <p>You are logged in, {{ auth()->user()->name }}!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
