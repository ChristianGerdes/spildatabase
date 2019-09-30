@extends('layouts.app')

@section('content')
    <div class="border-b pb-6 mb-6">
        <h1 class="text-4xl">SIEGE</h1>
        <div>{{ $games->total() }} resultater.</div>
    </div>

    <div class="flex flex-wrap">
        <div class="w-full md:w-1/4">
            <div class="mb-8">
                <div class="uppercase block font-semibold pb-3">Genre</div>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>Gyser</div>

                    <input type="checkbox">
                </label>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>Action</div>

                    <input type="checkbox">
                </label>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>Brætspil</div>

                    <input type="checkbox">
                </label>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>RPG</div>

                    <input type="checkbox">
                </label>
            </div>

            <div class="mb-8">
                <div class="uppercase block font-semibold pb-3">Årstal</div>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>2015</div>

                    <input type="checkbox">
                </label>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>2016</div>

                    <input type="checkbox">
                </label>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>2017</div>

                    <input type="checkbox">
                </label>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>2018</div>

                    <input type="checkbox">
                </label>
            </div>

            <div class="mb-8">
                <div class="uppercase block font-semibold pb-3">Udviklere</div>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>Steam</div>

                    <input type="checkbox">
                </label>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>Ubisoft</div>

                    <input type="checkbox">
                </label>

                <label class="block flex items-center justify-between border-t py-2 select-none">
                    <div>EA</div>

                    <input type="checkbox">
                </label>
            </div>
        </div>

        <div class="w-full px-6 md:w-3/4 md:pl-6 md:pr-0">
            <div class="flex flex-wrap -mx-2">
                @foreach ($games as $game)
                    <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
                        @include('games.partials.game-item')
                    </div>
                @endforeach
            </div>

            {{ $games->links() }}
        </div>
    </div>
@endsection