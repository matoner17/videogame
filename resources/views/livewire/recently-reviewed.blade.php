<div
    wire:init="loadRecentlyReviewed"
    class="recently-reviewed-container space-y-12 mt-8"
>
    @forelse ($recentlyReviewed as $game)
    <div class="game grid grid-rows-2 grid-flow-col sm:grid-rows-1 sm:grid-cols-2 sm:grid-flow-row bg-gray-800 rounded-lg shadow-md p-6">
        <div class="relative flex-none h-88">
            <a href="{{ route('games.show', $game['id']) }}">
                <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div id="review_{{ $game['id'] }}" class="absolute -bottom-4 -right-4 lg:right-0 xl:right-28 w-16 h-16 bg-gray-900 rounded-full"></div>
        </div>
        <div class="ml-6 lg:ml-0 xl:-ml-20">
            <a href="{{ route('games.show', $game['id']) }}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
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

@push('scripts')
    @include('_rating', [
        'event' => 'reviewGameRating',
    ])
@endpush
