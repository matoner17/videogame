<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $current = Carbon::now()->timestamp;
        $afterTwelveMonths = Carbon::now()->addMonths(12)->timestamp;

        $this->mostAnticipated = Cache::remember('most-anticipated', 60000, function () use ($current, $afterTwelveMonths) {
            return Http::withHeaders(config('services.igdb')
                    )->withBody("
                        fields name, cover.url, first_release_date, platforms.abbreviation, slug;
                        where
                        platforms = (48,49,130,6)
                        & (first_release_date >= {$current} & first_release_date < {$afterTwelveMonths});
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
        return view('livewire.most-anticipated');
    }
}
