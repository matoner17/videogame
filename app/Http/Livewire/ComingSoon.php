<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $comingSoonUnformatted = Cache::remember('coming-soon', 60000, function () use ($current, $afterFourMonths) {
            return Http::withHeaders(config('services.igdb')
                    )->withBody("
                        fields name, cover.url, first_release_date, platforms.abbreviation;
                        where
                        platforms = (48,49,130,6)
                        & (first_release_date >= {$current} & first_release_date < {$afterFourMonths});
                        sort first_release_date desc;
                        limit 4;",
                        'text/plain'
                    )->post(
                        'https://api.igdb.com/v4/games/'
                    )->json();
        });

        // dump($this->formatForView($comingSoonUnformatted));

        $this->comingSoon = $this->formatForView($comingSoonUnformatted);
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => array_key_exists('cover', $game) 
                    ? Str::replaceFirst('thumb', 'cover_small', $game['cover']['url'])
                    : 'https://via.placeholder.com/40x53',
                'releaseDate' => Carbon::parse($game['first_release_date'])->format('M d, Y'),
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
