@extends('layouts.app')

@section('content')
    <h1 class="text-4xl border-b pb-8 mb-8">Tilføj admins</h1>

    <div class="w-3/4">
        @foreach ($users as $user)
            <div class="flex items-center justify-between bg-white rounded border px-6 py-5 mb-3 hover:border-gray-500">
                <div>
                    <div class="text-lg font-medium mb-1">{{ $user->name }}</div>
                    <div class="italic text-sm">{{ $user->email }}</div>
                </div>
                <div>
                    @if ($user->isAdmin())
                        <a href="{{ route('admins.destroy', $user->id) }}" class="text-red-600">Fjern administratorprivilegier</a>
                    @else
                        <a href="{{ route('admins.store', $user->id) }}" class="text-green-600">Tildel administratorprivilegier</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection