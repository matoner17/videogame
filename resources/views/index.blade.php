@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Popular Games
        </h2>
        <div class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 text-sm border-b border-gray-800 pb-16">
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="/ff7.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-16 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                        <div class="flex justify-center font-semibold text-xs items-center h-full">
                            80%
                        </div>
                    </div>
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                        Final Fantasy VII Remake
                    </a>
                    <div class="text-gray-400 mt-1">
                        Playstation 4
                    </div>
                </div>
            </div>
        </div> <!-- end popular games -->
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                    Recently Reviewed
                </h2>
                <div class="recently-reviewed-container space-y-12 mt-8">
                    <div class="game flex bg-gray-800 rounded-lg shadow-md p-6">
                        <div class="relative flex-none">
                            <a href="#">
                                <img src="/ff7.jpg" alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="absolute bottom-16 -right-5 w-16 h-16 bg-gray-900 rounded-full">
                                <div class="flex justify-center font-semibold text-xs items-center h-full">
                                    80%
                                </div>
                            </div>
                            <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                                Final Fantasy VII Remake
                            </a>
                            <div class="text-gray-400 mt-1">
                                Playstation 4
                            </div>
                        </div>
                        <div class="ml-6 lg:ml-12">
                            <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                                Final Fantasy VII Remake
                            </a>
                            <div class="text-gray-400 mt-1">
                                Playstation 4
                            </div>
                            <p class="mt-6 text-gray-400 hidden lg:block">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex atque quaerat aliquam, doloribus ea possimus quod perferendis accusamus culpa id adipisci soluta, asperiores earum sequi velit dolorum distinctio, impedit corporis?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                    Most Anticipated
                </h2>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="flex game">
                        <a href="#">
                            <img src="/cyberpunk.jpg" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="#">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                        </div>
                    </div>
                </div>
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-12">
                    Coming Soon
                </h2>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="flex game">
                        <a href="#">
                            <img src="/cyberpunk.jpg" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="ml-4">
                            <a href="#">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
@endsection