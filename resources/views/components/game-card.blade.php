<div class="game relative h-96 mt-8">
    <div class="inline-block">
        <a href="{{ route('games.show', $game['id']) }}">
            <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="h-64 hover:opacity-75 transition ease-in-out duration-150">
        </a>
        @if ($game['aggregated_rating'])
        <div id="game_{{ $game['id'] }}" class="absolute bottom-28 right-32 sm:-right-4 w-16 h-16 bg-gray-800 rounded-full">
            @push('scripts')
                @include('_rating', [
                    'slug' => 'game_'.$game['id'],
                    'rating' => $game['aggregated_rating'],
                    'event' => null,
                ])
            @endpush
        </div>
        @endif
        <a href="{{ route('games.show', $game['id']) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
            {{ $game['name'] }}
        </a>
        <div class="text-gray-400 mt-1">
            {{ $game['platforms'] }}
        </div>
    </div>
</div>
