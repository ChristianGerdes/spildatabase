@extends('layouts.app')

@section('content')
    <div class="border-b flex items-center pb-8 mb-8 px-6">
        <h1 class="text-4xl mb-1">Tilføj spil</h1>
    </div>

    @if (auth()->user()->role == 1)
        <div class="bg-yellow-200 px-4 py-3 block rounded mb-8 text-yellow-700 border border-yellow-400 text-sm">
            Du har ikke adgang til at oprette spil, så de indsendte oplsyninger vil blive gennemgået af Det Kongelige Bibliotek inden publicering.
        </div>
    @endif

    <form action="{{ route('games.store') }}" method="POST">
        {!! csrf_field() !!}
        <div class="flex flex-wrap border-b pb-6 mb-6">
            <div class="w-full lg:w-4/12 pl-0 lg:pl-6 mb-3 lg:mb-0">
                <div class="font-semibold text-sm mt-6">Spiloplysninger</div>
                <div class="text-sm mt-1 leading-loose text-gray-600">Fortæl lidt om spillet</div>
            </div>
            <div class="w-full lg:w-8/12">
                <div class="bg-white w-full p-4 border border-gray-300 rounded">
                    <label class="block mb-4">
                        <div class="text-sm font-normal block mb-2 text-gray-700">Titel</div>
                        <div>
                            <input class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm" name="title">
                        </div>
                    </label>

                    <label class="block mb-4">
                        <div class="text-sm font-normal block mb-2 text-gray-700">URL</div>
                        <div>
                            <input class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm" name="url">
                        </div>
                    </label>

                    <label>
                        <div class="text-sm font-normal block mb-2 text-gray-700">Noter</div>
                        <div>
                            <textarea name="notes" cols="30" rows="6" class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm resize-none"></textarea>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap border-b pb-6 mb-6">
            <div class="w-full lg:w-4/12 pl-0 lg:pl-6 mb-3 lg:mb-0">
                <div class="font-semibold text-sm mt-6">Publicering</div>
                <div class="text-sm mt-1 leading-loose text-gray-600">Hvem har udgivet dette spil?</div>
            </div>
            <div class="w-full lg:w-8/12">
                <div class="bg-white w-full p-4 border border-gray-300 rounded">
                    <label class="block mb-4">
                        <div class="text-sm font-normal block mb-2 text-gray-700">Udgivelsesdato</div>
                        <div>
                            <input class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm">
                        </div>
                    </label>

                    <label class="block">
                        <div class="text-sm font-normal block mb-2 text-gray-700">Vælg udgiver</div>
                        <div>
                            <input class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm">
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap border-b pb-6 mb-6">
            <div class="w-full lg:w-4/12 pl-0 lg:pl-6 mb-3 lg:mb-0">
                <div class="font-semibold text-sm mt-6">Krediteringer</div>
                <div class="text-sm mt-1 leading-loose text-gray-600">Hvem har arbejdet på dette spil?</div>
            </div>
            <div class="w-full lg:w-8/12">
                <div class="bg-white w-full p-4 border border-gray-300 rounded">
                    <label>
                        <div class="text-sm font-normal block mb-2 text-gray-700">Vælg personer</div>
                        <div>
                            <input class="w-full text-gray-800 border-2 border-gray-300 rounded px-4 py-3 focus:border-blue-400 font-sans text-sm">
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <div class="w-full lg:w-8/12">
                <button class="bg-blue-400 text-white font-medium text-sm rounded px-4 py-2">Indsend spil</button>
            </div>
        </div>
    </form>
@endsection