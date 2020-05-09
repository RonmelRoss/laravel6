@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- show all notifications --}}
        <ul>
            @forelse ($notifications as $notification)
                <li>
                    {{-- {{ $notification->type }} --}}
                    @if ($notification->type === 'App\Notifications\SendNotification')
                        You have {{ $notification->data['amount'] }} likes.
                    @endif
                </li>
            @empty
                You're all caught up!
            @endforelse
        </ul>
        <form action="/notifications" method="POST">
            @csrf
            <button type="submit">AwardAchievements</button>
        </form>
        <br>
        <form action="/home">
            <button type="submit">Home</button>
        </form>
    </div>
@endsection