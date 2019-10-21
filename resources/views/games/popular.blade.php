@extends('layouts.app')

@section('content')
    <div class="w-3/4 mx-auto">
        <div class="border-b flex items-center pb-8 mb-8">
            <h1 class="text-4xl mb-1">Populære spil</h1>
        </div>

        @foreach ($games as $game)
            @include('games.partials.game-item')
        @endforeach
    </div>
@endsection