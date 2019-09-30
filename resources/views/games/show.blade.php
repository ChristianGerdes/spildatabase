@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between border-b pb-6 mb-6">
        <div>
            <h1 class="text-4xl">{{ $game->title }}</h1>
            <div>Published {{ $game->published_at->format('d. F Y') }}</div>
        </div>

        <div>
            <button type="button">
                <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/></svg>
            </button>
        </div>
    </div>

    <div class="flex">
        <div class="w-2/3 pr-16">
            <p class="mb-12">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in metus ullamcorper, sollicitudin magna nec, pulvinar eros. Donec rhoncus semper nunc. Nunc leo risus, pretium ac rutrum nec, pretium sit amet velit. Aenean rhoncus lacus eget arcu volutpat, eget finibus sem tincidunt. Ut non iaculis leo. Etiam ac leo lorem. Ut blandit sit amet mauris ut vestibulum. Aliquam in est id ligula ornare ultricies. Nulla facilisis dolor elit, sit amet tempor nulla mollis eu.<br>
                <br>
                Cras at condimentum odio. Proin nec lorem dui. Duis vitae ligula massa. Etiam nec nisi eu ante tristique ultrices. Fusce a tincidunt tellus, ac pulvinar diam. Pellentesque pharetra, justo quis faucibus congue, felis risus vestibulum sapien, a venenatis ex ipsum at lorem. Nullam at nisl eget urna sagittis lobortis. Phasellus eu condimentum justo, quis tristique leo. Nullam tristique nisi turpis, sit amet vestibulum sem convallis eget. Donec neque orci, pellentesque at urna eget, scelerisque pharetra nibh. Ut a tristique massa. Proin vehicula in nisl elementum consectetur. Sed mauris purus, iaculis eget accumsan vel, iaculis vel sem. Proin auctor libero eget enim condimentum, eget faucibus purus tincidunt.
            </p>

            <h2 class="text-2xl mb-4">Krediteringer</h2>
            @foreach ($game->credits as $credit)
                <a href="{{ route('contributors.show', $credit->pivot->contributor_id) }}" class="flex items-center mb-2 bg-white border rounded px-4 py-4 hover:border-gray-500">
                    <img class="w-16 h-16 rounded-full mr-4" src="https://www.biography.com/.image/t_share/MTY2MzU3Nzk2OTM2MjMwNTkx/elon_musk_royal_society.jpg" alt="">

                    <div class="flex-1">
                        <div class="text-gray-700">{{ $credit->name }}</div>
                        <div class="uppercase text-sm text-gray-500">{{ $credit->pivot->type }}</div>
                    </div>

                    @if ($credit->credits_count > 1)
                        <div class="text-sm text-gray-500 pr-6">
                            Contributed to <span class="bg-blue-100 text-blue-500 p-1 rounded-lg">{{ $credit->credits_count - 1 }}</span> other games
                        </div>
                    @endif
                </a>
            @endforeach
        </div>

        <div class="w-1/3"></div>
    </div>
@endsection