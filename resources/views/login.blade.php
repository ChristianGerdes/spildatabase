@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="mb-8 text-3xl text-center">Log ind</h1>

        <div class="border border-gray-300 rounded bg-white p-4">
            <form action="{{ route('sessions.store') }}" method="POST">
                {!! csrf_field() !!}
                <label class="block mb-4">
                    <div class="text-sm font-normal block mb-2 text-gray-700">Email</div>
                    <input type="email" name="email" class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm">
                </label>

                <label>
                    <div class="text-sm font-normal block mb-2 text-gray-700">Kodeord</div>
                    <input type="password" name="password" class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm">
                </label>

                <button class="bg-blue-400 text-white px-4 py-2 mt-4 rounded text-sm">Log ind</button>
            </form>
        </div>
    </div>
@endsection