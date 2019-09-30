@extends('layouts.app')

@section('content')
    <div class="border-b pb-6 mb-6">
        <h1 class="text-4xl">{{ $contributor->name }}</h1>
        <div class="text-sm text-gray-500">
            Contributed to <span class="bg-blue-100 text-blue-500 p-1 rounded-lg">{{ $contributor->credits_count }}</span> games in total
        </div>
    </div>

    <div class="flex flex-wrap -mx-2">
        @foreach ($contributor->credits as $game)
            <div class="w-1/2 sm:w-1/3 md:w-1/5 lg:w-1/6">
                @include('games.partials.game-item')
            </div>
        @endforeach
    </div>
@endsection