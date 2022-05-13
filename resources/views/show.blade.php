@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="game-details flex flex-col lg:flex-row border-b border-gray-800 pb-12">
            <div class="flex-none">
                <img src="/ff7.jpg" alt="game cover">
            </div>

            <div class="ml-0 lg:ml-12 mr-0 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">
                    Final Fantasy VII Remake
                </h2>
                <div class="text-gray-400">
                    <span>Genre(s)</span>
                    &middot;
                    <span>Publisher</span>
                    &middot;
                    <span>Console</span>
                </div>
                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="flex justify-center items-center font-semibold text-xs h-full">90%</div>
                        </div>
                        <div class="ml-4 text-xs">Member <br> Score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="flex justify-center items-center font-semibold text-xs h-full">92%</div>
                        </div>
                        <div class="ml-4 text-xs">Critic <br> Score</div>
                    </div>
                    <div class="flex items-center space-x-4 mt-4 sm:mt-0 sm:ml-12">
                        <div class="flex justify-center items-center w-8 h-8 bg-gray-800 rounded-full">
                            <a href="#" class="hover:text-gray-400">O</a>
                        </div>
                    </div>
                </div>

                <p class="mt-12">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, adipisci.
                </p>

                <div class="mt-12">
                    <button class="flex bg-blue-500 text-white font-semibold p-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span>P</span>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div> <!-- end game details -->

        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Images
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                <div>
                    <a href="#">
                        <img src="/screenshot1.jpg" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
            </div>
        </div> <!-- end images container -->

        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                Similar Games
            </h2>
            <div class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 text-sm">
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="show">
                            <img src="/ff7.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="absolute bottom-16 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                            <div class="flex justify-center font-semibold text-xs items-center h-full">80%</div>
                        </div>
                        <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                            Final Fantasy VII Remake
                        </a>
                        <div class="text-gray-400 mt-1">
                            Playstation 4
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end similar games container -->
    </div>
@endsection