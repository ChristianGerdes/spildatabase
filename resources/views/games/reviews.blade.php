@extends('layouts.app')

@section('content')
    <div>
        <h1 class="text-4xl border-b pb-6 mb-6">Games in review</h1>
        <div class="flex flex-wrap mt-12">
            <div class="w-3/4">
                @foreach ($games as $game)
                    <a href="{{ route('games.show', $game) }}" class="w-full block bg-white border px-6 py-4 rounded hover:border-gray-500">
                        <div class="flex items-center justify-between mb-1">
                            <div class="font-semibold text-md tracking-wide">{{ $game->title }}</div>

                        </div>

                        <div class="text-sm text-gray-600">
                            <span class="italic">{{ $game->notes }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection