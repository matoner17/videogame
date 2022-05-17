<div
    x-data="{ isVisible: true }"
    x-on:click.away="isVisible = false"
    class="relative"
>
    <input
        wire:model.debounce.300ms="search"
        x-ref="search"
        x-on:keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        x-on:focus="isVisible = true"
        x-on:keydown.escape.window="isVisible = false"
        x-on:keydown="isVisible = true"
        x-on:keydown.shift.tab="isVisible = false"
        type="text"
        class="bg-gray-800 text-sm rounded-full w-64 px-3 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Search (Press '/' to focus)"
    >
    <div class="flex items-center absolute top-0 h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3" style="position:absolute;font-size:0.4rem"></div>

    @if (strlen($search) >= 2)
    <div
        x-show.transition.opacity.duration.200="isVisible"
        class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2"
    >
        @if (count($searchResults) > 0)
        <ul>
            @foreach ($searchResults as $result)
            <li class="border-b border-gray-700">
                <a
                    href="{{ route('games.show', $result['slug']) }}"
                    @if ($loop->last) x-on:keydown.tab="isVisible = false" @endif
                    class="flex items-center hover:bg-gray-700 transition ease-in-out duration-150 p-3"
                >
                    <img src="{{ $result['coverImageUrl'] }}" alt="cover" class="w-10">
                    <span class="ml-4">{{ $result['name'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="p-3">No results for "{{ $search }}"</div>
        @endif
    </div>
    @endif
</div>
