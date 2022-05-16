@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="game-details flex flex-col lg:flex-row border-b border-gray-800 pb-12">
            <div class="flex-none">
                <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="game cover">
            </div>

            <div class="ml-0 lg:ml-12 mr-0 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">
                    {{ $game['name'] }}
                </h2>
                <div class="text-gray-400">
                    <span>
                    @foreach ($game['genres'] as $genre)
                        {{ $genre['name'] }},
                    @endforeach
                    </span>
                    &middot;
                    <span>
                    {{ $game['involved_companies'][0]['company']['name'] }}
                    </span>
                    &middot;
                    <span>
                    @foreach ($game['platforms'] as $platform)
                        {{ $platform['abbreviation'] }},
                    @endforeach
                    </span>
                </div>
                <div class="flex flex-wrap items-center mt-8">
                    @if (array_key_exists('aggregated_rating', $game))
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="flex justify-center items-center font-semibold text-xs h-full">{{ round($game['aggregated_rating']).'%' }}</div>
                        </div>
                        <div class="ml-4 text-xs">Aggregated <br>Rating</div>
                    </div>                       
                    @endif
                    @if (array_key_exists('rating', $game))
                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="flex justify-center items-center font-semibold text-xs h-full">{{ round($game['rating']).'%' }}</div>
                        </div>
                        <div class="ml-4 text-xs">IGDB <br> Rating</div>
                    </div>
                    @endif
                    <div class="flex items-center space-x-4 mt-4 sm:mt-0 sm:ml-12">
                        <div class="flex justify-center items-center w-8 h-8 bg-gray-800 rounded-full">
                            <a href="#" class="hover:text-gray-400">O</a>
                        </div>
                    </div>
                </div>

                <p class="mt-12">
                    {{ $game['summary'] }}
                </p>

                <div class="mt-12">
                    {{-- <button class="flex bg-blue-500 text-white font-semibold p-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span>P</span>
                        <span class="ml-2">Play Trailer</span>
                    </button> --}}
                    <a href="https://youtube.com/watch/{{ $game['videos'][0]['video_id'] }}" class="inline-flex bg-blue-500 text-white font-semibold p-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span>P</span>
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
            </div>
        </div> <!-- end game details -->

        @if (isset($game['screenshots']))
        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Images
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach ($game['screenshots'] as $screenshot)
                <div>
                    <a href="{{ Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']) }}">
                        <img src="{{ Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']) }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
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
                @foreach (array_slice($game['similar_games'], 0, 6) as $game)
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="{{ route('games.show', str_replace(':', '', str_replace(' ', '-', strtolower($game['name'])))) }}">
                            <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        @if (isset($game['aggregated_rating']))
                        <div class="absolute bottom-16 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                            <div class="flex justify-center font-semibold text-xs items-center h-full">{{ round($game['aggregated_rating']).'%' }}</div>
                        </div>
                        @endif
                        <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                            {{ $game['name'] }}
                        </a>
                        <div class="text-gray-400 mt-1">
                        @foreach ($game['platforms'] as $platform)
                            {{ $platform['abbreviation'] }},
                        @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> <!-- end similar games container -->
    </div>
@endsection