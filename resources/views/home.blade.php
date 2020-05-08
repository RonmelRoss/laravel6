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
                    <form
                        method="POST"
                        action="/home"
                        class="bg-white p-20 rounded shadow-md"
                        style="width:500 px"
                    >
                        @csrf
                        <button type="submit">Send Notification</button>
                    </form>
                    @if (session('notify'))
                    <div>
                        {{ session('notify')}}
                    </div>
                    @endif
                <div style="padding-top: 20px"><a href="notifications">Go to notifications</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
