@extends('layouts.app')

@section('content')
    <div class="w-3/4 mx-auto">
        @foreach ($games as $game)
            @include('games.partials.game-item')
        @endforeach
    </div>
@endsection