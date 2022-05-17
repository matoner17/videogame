@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="game-details flex flex-col lg:flex-row border-b border-gray-800 pb-12">
            <div class="flex-none">
                <img src="{{ $game['coverImageUrl'] }}" alt="game cover">
            </div>

            <div class="ml-0 lg:ml-12 mr-0 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">
                    {{ $game['name'] }}
                </h2>
                <div class="text-gray-400">
                    <span>{{ $game['genres'] }}</span>
                    &middot;
                    <span>{{ $game['publisher'] }}</span>
                    &middot;
                    <span>{{ $game['platforms'] }}</span>
                </div>
                <div class="flex flex-wrap items-center mt-8">
                    @if ($game['aggregated_rating'])
                    <div class="flex items-center">
                        <div id="aggregatedRating" class="w-16 h-16 bg-gray-800 rounded-full relative">
                            @push('scripts')
                                @include('_rating', [
                                    'slug' => 'aggregatedRating',
                                    'rating' => $game['aggregated_rating'],
                                    'event' => null,
                                ])
                            @endpush
                        </div>
                        <div class="ml-4 text-xs">Aggregated <br>Rating</div>
                    </div>                       
                    @endif
                    @if ($game['rating'])
                    <div class="flex items-center ml-12">
                        <div id="igdbRating" class="w-16 h-16 bg-gray-800 rounded-full relative">
                            @push('scripts')
                                @include('_rating', [
                                    'slug' => 'igdbRating',
                                    'rating' => $game['rating'],
                                    'event' => null,
                                ])
                            @endpush
                        </div>
                        <div class="ml-4 text-xs">IGDB <br> Rating</div>
                    </div>
                    @endif
                    <div class="flex items-center space-x-4 mt-4 sm:mt-0 sm:ml-12">
                        @if ($game['social']['website'])
                        <div class="flex justify-center items-center w-8 h-8 bg-gray-800 rounded-full">
                            <a href="{{ $game['social']['website']['url'] }}" class="hover:text-gray-400">O</a>
                        </div> 
                        @endif
                        @if ($game['social']['instagram'])
                        <div class="flex justify-center items-center w-8 h-8 bg-gray-800 rounded-full">
                            <a href="{{ $game['social']['instagram']['url'] }}" class="hover:text-gray-400">O</a>
                        </div> 
                        @endif
                        @if ($game['social']['twitter'])
                        <div class="flex justify-center items-center w-8 h-8 bg-gray-800 rounded-full">
                            <a href="{{ $game['social']['twitter']['url'] }}" class="hover:text-gray-400">O</a>
                        </div> 
                        @endif
                        @if ($game['social']['facebook'])
                        <div class="flex justify-center items-center w-8 h-8 bg-gray-800 rounded-full">
                            <a href="{{ $game['social']['facebook']['url'] }}" class="hover:text-gray-400">O</a>
                        </div> 
                        @endif
                    </div>
                </div>

                <p class="mt-12">
                    {{ $game['summary'] }}
                </p>

                <div class="mt-12">
                    @if ($game['trailer'])
                    {{-- <button class="flex bg-blue-500 text-white font-semibold p-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span>P</span>
                        <span class="ml-2">Play Trailer</span>
                    </button> --}}
                    <a href="{{ $game['trailer'] }}" class="inline-flex bg-blue-500 text-white font-semibold p-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span>P</span>
                        <span class="ml-2">Play Trailer</span>
                    </a>    
                    @endif
                </div>
            </div>
        </div> <!-- end game details -->

        @if ($game['screenshots'])
        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Images
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach ($game['screenshots'] as $screenshot)
                <div>
                    <a href="{{ $screenshot['big'] }}">
                        <img src="{{ $screenshot['huge'] }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                @endforeach
            </div>
        </div> <!-- end images container -->
        @endif

        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Similar Games
            </h2>
            <div class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 text-sm">
                @foreach ($game['similarGames'] as $game)
                <x-game-card :game="$game" />
                @endforeach
            </div>
        </div> <!-- end similar games container -->
    </div>
@endsection