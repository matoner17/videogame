<div
    wire:init="loadRecentlyReviewed"
    class="recently-reviewed-container space-y-12 mt-8"
>
    @forelse ($recentlyReviewed as $game)
    <div class="game flex bg-gray-800 rounded-lg shadow-md p-6">
        <div class="relative flex-none">
            <a href="{{ route('games.show', $game['slug']) }}">
                <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="absolute bottom-16 -right-5 w-16 h-16 bg-gray-900 rounded-full">
                <div class="flex justify-center font-semibold text-xs items-center h-full">
                    {{ $game['aggregated_rating'] }}
                </div>
            </div>
        </div>
        <div class="ml-6 lg:ml-12">
            <a href="{{ route('games.show', $game['slug']) }}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                {{ $game['name'] }}
            </a>
            <div class="text-gray-400 mt-1">
                {{ $game['platforms'] }}
            </div>
            <p class="mt-6 text-gray-400 hidden lg:block">
                {{ $game['summary'] }}
            </p>
        </div>
    </div>
    @empty
    @foreach (range(1, 3) as $game)
    <div class="game flex bg-gray-800 rounded-lg shadow-md p-6">
        <div class="relative flex-none">
            <div class="bg-gray-700 w-32 lg:w-48 h-40 lg:h-56"></div>
        </div>
        <div class="ml-6 lg:ml-12">
            <div class="inline-block text-transparent text-lg leading-tight bg-gray-700 rounded mt-4">
                title goes here
            </div>
            <div class="mt-8 space-y-4 text-gray-400 hidden lg:block">
                @foreach (range(1, 3) as $summary)
                <span class="inline-block text-transparent bg-gray-700 rounded">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, dolorem.</span>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    @endforelse
</div>
