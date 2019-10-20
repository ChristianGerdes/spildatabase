@extends('layouts.app')

@section('content')
    <div class="w-3/4 mx-auto">
        @foreach ($publishers as $publisher)
            <a href="{{ route('publishers.show', $publisher) }}" class="flex justify-between border bg-white px-6 py-4 rounded mb-2 hover:border-gray-500">
                <div class="text-gray-700 font-medium">{{ $publisher->name }}</div>

                <div class="text-sm text-gray-500">Published <span class="bg-blue-100 text-blue-500 p-1 rounded-lg">{{ $publisher->games_count }}</span> games</div>
            </a>
        @endforeach

        {!! $publishers->links() !!}
    </div>
@endsection