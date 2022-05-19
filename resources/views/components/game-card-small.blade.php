<div class="flex game">
    <a href="{{ route('games.show', $game['id']) }}">
        <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="ml-4">
        <a href="{{ route('games.show', $game['id']) }}">{{ $game['name'] }}</a>
        <div class="text-gray-400 text-sm mt-1">
            {{ $game['releaseDate'] }}
        </div>
    </div>
</div>