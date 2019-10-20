@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="mb-8 text-3xl text-center">Opret bruger</h1>

        <div class="border border-gray-300 rounded bg-white p-4">
            <form action="{{ route('users.store') }}" method="POST">
                {!! csrf_field() !!}
                <label class="block mb-4">
                    <div class="text-sm font-normal block mb-2 text-gray-700">Fulde navn</div>
                    <input class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm" name="name">
                </label>

                <label class="block mb-4">
                    <div class="text-sm font-normal block mb-2 text-gray-700">Email</div>
                    <input type="email" class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm" name="email">
                </label>

                <label>
                    <div class="text-sm font-normal block mb-2 text-gray-700">Kodeord</div>
                    <input type="password" class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm" name="password">
                </label>

                <button class="bg-blue-400 text-white px-4 py-2 mt-4 rounded text-sm">Opret bruger</button>
            </form>
        </div>
    </div>
@endsection