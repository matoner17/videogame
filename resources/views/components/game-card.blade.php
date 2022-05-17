<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $game['slug']) }}">
            <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        @if (isset($game['aggregated_rating']))
        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full">
            <div class="flex justify-center font-semibold text-xs items-center h-full">{{ $game['aggregated_rating'] }}</div>
        </div>
        @endif
        <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
            {{ $game['name'] }}
        </a>
        <div class="text-gray-400 mt-1">
            {{ $game['platforms'] }}
        </div>
    </div>
</div>
