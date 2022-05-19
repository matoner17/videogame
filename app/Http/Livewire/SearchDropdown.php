<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    public $searchResults = [];

    public function render()
    {
        if (strlen($this->search) >= 2) {
            $searchResultsUnformatted = Http::withHeaders(config('services.igdb')
                        )->withBody("
                            search \"$this->search\";
                            fields name, game.id, game.cover.url;
                            limit 6;",
                            'text/plain'
                        )->post(
                            'https://api.igdb.com/v4/search/'
                        )->json();

            $this->searchResults = $this->formatForView($searchResultsUnformatted);
        }

        //dump($this->searchResults);

        return view('livewire.search-dropdown');
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => isset($game['game']['cover']) 
                    ? Str::replaceFirst('thumb', 'cover_small', $game['game']['cover']['url']) 
                    : 'https://via.placeholder.com/40x53',
                'gameId' => array_key_exists('game', $game)
                    ? $game['game']['id']
                    : '#',
            ]);
        })->toArray();
    }
}
