<a href="{{ route('games.show', $game) }}" class="w-full block bg-white border px-6 py-4 rounded hover:border-gray-500 mb-4">
    <div class="flex items-center justify-between mb-1">
        <div class="font-semibold text-md tracking-wide">{{ $game->title }}</div>

        @if ($game->published_at)
            <div class="text-sm flex items-center">
                <svg class="w-3 h-3 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-7.59V4h2v5.59l3.95 3.95-1.41 1.41L9 10.41z"/></svg>

                <div>{{ $game->published_at->format('Y') }}</div>
            </div>
        @endif
    </div>

    <div class="text-sm text-gray-600">
        @if ($game->notes)
            <span>{{ $game->notes }}</span>
        @else
            <span class="italic">No notes</span>
        @endif
    </div>

    @if ($game->credits->count() || $game->publishers->count())
        <div class="mt-4">
            @foreach ($game->credits as $credit)
                <div class="inline-block text-xs bg-blue-100 text-blue-500 py-1 px-3 rounded-lg">{{ $credit->name }}</div>
            @endforeach

            @foreach ($game->publishers as $publisher)
                <div class="inline-block text-xs bg-green-100 text-green-500 py-1 px-3 rounded-lg">{{ $publisher->name }}</div>
            @endforeach
        </div>
    @endif
</a>