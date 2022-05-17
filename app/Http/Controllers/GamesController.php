<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $gameUnformatted = Http::withHeaders(config('services.igdb')
            )->withBody("
                fields name, cover.url, first_release_date, genres.name, involved_companies.company.name, platforms.abbreviation, slug,
                summary, rating, aggregated_rating,
                websites.*, videos.*, screenshots.*,
                similar_games.cover.url, similar_games.name, similar_games.aggregated_rating, similar_games.platforms.abbreviation;
                where slug=\"{$slug}\";",
                'text/plain'
            )->post(
                'https://api.igdb.com/v4/games/'
            )->json();

        $game = $this->formatForView($gameUnformatted);

        abort_if(!$game, 404);

        return view('show', [
            'game' => $game[0],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function formatForView($game)
    {
        return collect($game)->map(function ($item) {
            return collect($item)->merge([
                'coverImageUrl' => array_key_exists('cover', $item)
                    ? Str::replaceFirst('thumb', 'cover_big', $item['cover']['url'])
                    : 'https://via.placeholder.com/264x352',
                'aggregated_rating' => array_key_exists('aggregated_rating', $item)
                    ? round($item['aggregated_rating']).'%'
                    : null,
                'rating' => array_key_exists('rating', $item) 
                    ? round($item['rating']).'%'
                    : null,
                'genres' => array_key_exists('genres', $item)
                    ? collect($item['genres'])->pluck('name')->implode(', ')
                    : null,
                'platforms' => array_key_exists('platforms', $item) 
                    ? collect($item['platforms'])->pluck('abbreviation')->implode(', ')
                    : null,
                'publisher' => array_key_exists('involved_companies', $item)
                    ? $item['involved_companies'][0]['company']['name'] 
                    : null,
                'trailer' => array_key_exists('videos', $item) 
                    ? 'https://youtube.com/watch/'.$item['videos'][0]['video_id'] 
                    : null,
                'slug' => array_key_exists('slug', $item) 
                    ? $item['slug'] 
                    : str_replace(':', '', str_replace(' ', '-', str_replace('&', 'and', strtolower($item['name'])))),
                'screenshots' => array_key_exists('screenshots', $item) 
                    ? collect($item['screenshots'])->map(function ($screenshot) {
                        return [
                            'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                            'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                        ];
                    }) 
                    : null,
                'similarGames' => collect($item['similar_games'])->map(function ($game) {
                    return collect($game)->merge([
                        'coverImageUrl' => array_key_exists('cover', $game)
                            ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                            : 'https://via.placeholder.com/264x352',
                        'aggregated_rating' => array_key_exists('aggregated_rating', $game) 
                            ? round($game['aggregated_rating']).'%' 
                            : null,
                        'rating' => array_key_exists('rating', $game) 
                            ? round($game['rating']).'%' 
                            : null,
                        'platforms' => array_key_exists('platforms', $game) 
                            ? collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                            : null,
                        'slug' => array_key_exists('slug', $game) 
                            ? $game['slug'] 
                            : str_replace(':', '', str_replace(' ', '-', str_replace('&', 'and', strtolower($game['name'])))),
                    ]);
                })->take(6),
                'social' => [
                    'website' => collect($item['websites'])->first(),
                    'facebook' => collect($item['websites'])->filter(function ($website) {
                        return Str::contains($website['url'], 'facebook');
                    })->first(),
                    'twitter' => collect($item['websites'])->filter(function ($website) {
                        return Str::contains($website['url'], 'twitter');
                    })->first(),
                    'instagram' => collect($item['websites'])->filter(function ($website) {
                        return Str::contains($website['url'], 'instagram');
                    })->first(),
                ],
            ]);
        })->toArray();
    }
}
