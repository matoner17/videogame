<div
    wire:init="loadPopularGames"
    class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 text-sm border-b border-gray-800 pb-16"
>
    @forelse ($popularGames as $game)
    <x-game-card :game="$game" />
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

@push('scripts')
    @include('_rating', [
        'event' => 'gameRating',
    ])
@endpush
