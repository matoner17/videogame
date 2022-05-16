<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(36)->timestamp;
        $after = Carbon::now()->addMonths(36)->timestamp;

        $this->popularGames = Cache::remember('popular-games-new', 60000, function () use ($before, $after) {
            return Http::withHeaders(config('services.igdb')
                    )->withBody("
                        fields name, cover.url, first_release_date, platforms.abbreviation, slug, rating, aggregated_rating;
                        where
                        slug != null
                        & aggregated_rating > 0
                        & platforms = (48,49,130,6)
                        & (first_release_date >= {$before} & first_release_date < {$after});
                        sort aggregated_rating desc;
                        limit 12;",
                        'text/plain'
                    )->post(
                        'https://api.igdb.com/v4/games/'
                    )->json();
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
