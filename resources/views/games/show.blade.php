@extends('layouts.app')

@section('content')
    <div class="w-3/4 mx-auto">
        @if ( ! $game->isPublished())
            <div class="bg-yellow-200 px-4 py-3 block rounded mb-8 text-yellow-700 border border-yellow-400 text-sm">
                Dette spil er ikke blevet gennemgået og kan derfor kun ses af admins.
            </div>
        @endif

        <div class="flex items-center justify-between border-b pb-6 mb-6">
            <div>
                <h1 class="text-4xl">{{ $game->title }}</h1>
                @if ($game->published_at)
                    <span class="mt-1 text-gray-600">Published {{ $game->published_at->format('d. F Y') }}</span>
                @endif

                @if ($game->url)
                    <span class="text-sm text-blue-600">{{ $game->url }}</span>
                @endif
            </div>

            @if (auth()->check() && auth()->user()->isAdmin())
                <div>
                    <a href="{{ route('games.edit', $game) }}">
                        <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg>
                    </a>
                </div>
            @endif
        </div>

        <p class="mb-12 leading-relaxed">
            {{ $game->notes }}

            @if ( ! $game->notes)
                <span class="italic">No notes</span>
            @endif
        </p>

        <div class="mb-12">
            <h2 class="text-xl mb-3">Krediteringer</h2>
            @foreach ($game->credits as $credit)
                <a href="{{ route('contributors.show', $credit->pivot->contributor_id) }}" class="flex items-center justify-between mb-2 bg-white border rounded px-4 py-4 hover:border-gray-500">
                    <div class="text-gray-700 font-medium">{{ $credit->name }}</div>

                    <div class="text-sm text-gray-500">
                        Contributed to <span class="bg-blue-100 text-blue-500 p-1 rounded-lg">{{ $credit->credits_count }}</span> games
                    </div>
                </a>
            @endforeach
        </div>

        <div>
            <h3 class="text-xl mb-3">Udgivere</h3>

            @foreach ($game->publishers as $publisher)
                <a href="{{ route('publishers.show', $publisher) }}" class="flex justify-between border bg-white px-6 py-4 rounded mb-2 hover:border-gray-500">
                    <div class="text-gray-700 font-medium">{{ $publisher->name }}</div>

                    <div class="text-sm text-gray-500">Published <span class="bg-blue-100 text-blue-500 p-1 rounded-lg">{{ $publisher->games_count }}</span> games</div>
                </a>
            @endforeach
        </div>
    </div>
@endsection