<a href="{{ route('games.show', $game->id) }}" class="block bg-white rounded-lg overflow-hidden shadow mx-2 mb-4 hover:shadow-md hover:text-gray-600">
    <img src="https://store.playstation.com/store/api/chihiro/00_09_000/container/US/en/999/UP0001-CUSA01800_00-RB6SIEGESPULTI04/1567553387000/image?w=240&h=240&bg_color=000000&opacity=100&_version=00_09_000">
    <div class="text-center uppercase py-3 text-xs">{{ $game->title }}</div>
</a>