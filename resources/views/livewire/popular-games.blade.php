<div
    wire:init="loadPopularGames"
    class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 text-sm border-b border-gray-800 pb-16"
>
    @forelse ($popularGames as $game)
    <div class="game mt-8">
        <div class="relative inline-block">
            <a href="{{ route('games.show', $game['slug']) }}">
                <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="absolute bottom-16 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                <div class="flex justify-center font-semibold text-xs items-center h-full">{{ round($game['aggregated_rating']).'%' }}</div>
            </div>
            <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                {{ $game['name'] }}
            </a>
            <div class="text-gray-400 mt-1">
            @foreach ($game['platforms'] as $platform)
                @if (array_key_exists('abbreviation', $platform))
                {{ $platform['abbreviation'] }},
                @endif
            @endforeach
            </div>
        </div>
    </div>
    @empty
    @foreach (range(1, 12) as $game)
    <div class="game mt-8">
        <div class="relative inline-block">
            <div class="bg-gray-800 w-44 h-56"></div>
            <div class="block text-transparent text-lg leading-tight bg-gray-700 rounded hover:text-gray-400 mt-4">
                title goes here
            </div>
            <div class="text-transparent bg-gray-700 rounded inline-block mt-3">systems go here</div>
        </div>
    </div>
    @endforeach
    @endforelse
</div> <!-- end popular games -->
