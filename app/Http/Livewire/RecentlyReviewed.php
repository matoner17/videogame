<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(36)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->recentlyReviewed = Cache::remember('recently-reviewed', 60000, function () use ($before, $current) {
            return Http::withHeaders(config('services.igdb')
                    )->withBody("
                        fields name, cover.url, first_release_date, platforms.abbreviation, summary, slug, rating, aggregated_rating, rating_count;
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
    }
    
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
