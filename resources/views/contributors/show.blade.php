@extends('layouts.app')

@section('content')
    <div class="w-3/4 mx-auto">
        <div class="border-b flex items-center pb-8 mb-8">
            <div>
                <h1 class="text-4xl mb-1">{{ $contributor->name }}</h1>
                <div class="text-sm text-gray-500">
                    Contributed to <span class="bg-blue-100 text-blue-500 p-1 rounded-lg">{{ $contributor->credits_count }}</span> games in total
                </div>
            </div>
        </div>

        <div>
            @foreach ($contributor->credits as $game)
                @include('games.partials.game-item')
            @endforeach
        </div>
    </div>
@endsection