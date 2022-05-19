<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(36)->timestamp;
        $after = Carbon::now()->addMonths(36)->timestamp;

        $popularGamesUnformatted = Cache::remember('popular-games-new', 60000, function () use ($before, $after) {
            return Http::withHeaders(config('services.igdb')
                    )->withBody("
                        fields name, cover.url, first_release_date, platforms.abbreviation, rating, aggregated_rating, total_rating_count;
                        where
                        aggregated_rating > 0
                        & platforms = (48,49,130,6)
                        & (first_release_date >= {$before} & first_release_date < {$after});
                        sort total_rating_count desc;
                        limit 12;",
                        'text/plain'
                    )->post(
                        'https://api.igdb.com/v4/games/'
                    )->json();
        });

        $this->popularGames = $this->formatForView($popularGamesUnformatted);

        collect($this->popularGames)->filter(function ($game) {
            return $game['aggregated_rating'];
        })->each(function ($game) {
            $this->emit('gameRating', [
                'slug' => 'game_'.$game['id'],
                'rating' => $game['aggregated_rating'] / 100
            ]);
        });
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'aggregated_rating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating']) : null,
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
                'slug' => isset($game['slug']) ? $game['slug'] : str_replace(':', '', str_replace(' ', '-', str_replace('&', 'and', strtolower($game['name'])))),
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
