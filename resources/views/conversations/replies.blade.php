@foreach ($conversation->replies as $reply)
    <div>
        <p class="m-0"><strong>{{ $reply->user->name }} said ...</strong></p>

        {{ $reply-> body }}
    </div>

    @can('update-conversation', $conversation)
        <form method="POST" action="/best-replies/{{ $reply->id }}">
            @csrf
            <button type="submit" class="text-muted">Best Reply?</button>
        </form>
    @endcan

    @continue($loop->last)

    <hr>
@endforeach
