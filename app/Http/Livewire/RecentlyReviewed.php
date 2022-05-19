<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(36)->timestamp;
        $current = Carbon::now()->timestamp;

        $recentlyReviewedUnformatted = Cache::remember('recently-reviewed', 60000, function () use ($before, $current) {
            return Http::withHeaders(config('services.igdb')
                    )->withBody("
                        fields name, cover.url, first_release_date, platforms.abbreviation, summary, rating, aggregated_rating, rating_count;
                        where
                        rating_count > 5
                        & aggregated_rating > 0
                        & platforms = (48,49,130,6)
                        & (first_release_date >= {$before} & first_release_date < {$current});
                        sort first_release_date desc;
                        limit 3;",
                        'text/plain'
                    )->post(
                        'https://api.igdb.com/v4/games/'
                    )->json();
        });

        $this->recentlyReviewed = $this->formatForView($recentlyReviewedUnformatted);

        collect($this->recentlyReviewed)->filter(function ($game) {
            return $game['aggregated_rating'];
        })->each(function ($game) {
            $this->emit('reviewGameRating', [
                'slug' => 'review_'.$game['id'],
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
            ]);
        })->toArray();
    }
    
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
