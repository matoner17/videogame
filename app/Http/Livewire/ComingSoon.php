<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $this->comingSoon = Cache::remember('coming-soon', 60000, function () use ($current, $afterFourMonths) {
            return Http::withHeaders(config('services.igdb')
                    )->withBody("
                        fields name, cover.url, first_release_date, platforms.abbreviation, slug;
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
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
