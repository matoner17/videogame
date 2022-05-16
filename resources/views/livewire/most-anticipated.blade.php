<div
    wire:init="loadMostAnticipated"
    class="most-anticipated-container space-y-10 mt-8"
>
    @forelse ($mostAnticipated as $game)
    <div class="flex game">
        <a href="#">
            <img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="ml-4">
            <a href="#">{{ $game['name'] }}</a>
            <div class="text-gray-400 text-sm mt-1">
                {{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
            </div>
        </div>
    </div>
    @empty
    @foreach (range(1, 4) as $game)
    <div class="flex game">
        <div class="flex-none bg-gray-800 w-16 h-20"></div>
        <div class="ml-4">
            <div class="text-transparent bg-gray-700 rounded leading-tight">title goes here</div>
            <div class="text-transparent text-sm bg-gray-700 rounded inline-block mt-2">date goes here</div>
        </div>
    </div>
    @endforeach
    @endforelse
</div>
