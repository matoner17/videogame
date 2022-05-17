<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewGameTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_game_page_shows_correct_game_info()
    {
        /* Http::fake([
            'https://api.igdb.com/v4/games/' => Http::response(['foo' => 'bar'], 200, fakingSingleGame()),
        ]); */
        
        $response = $this->get(route('games.show', 'trek-to-yomi'));

        $response->assertSuccessful();
    }

    /* private function fakeSingleGame()
    {
        return Http::response([
            0 => [
              "id" => 152203
              "aggregated_rating" => "66%"
              "cover" => [
                "id" => 219320
                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co4p88.jpg"
              ]
              "first_release_date" => 1651708800
              "genres" => "Hack and slash/Beat 'em up, Adventure, Indie"
              "involved_companies" => [
                0 => [
                  "id" => 165318
                  "company" => [
                    "id" => 420
                    "name" => "Flying Wild Hog"
                  ]
                ]
                1 => [
                  "id" => 165319
                  "company" => [
                    "id" => 10303
                    "name" => "Leonard Menchiari"
                  ]
                ]
                2 => [
                  "id" => 165320
                  "company" => [
                    "id" => 634
                    "name" => "Devolver Digital"
                  ]
                ]
              ]
              "name" => "Trek to Yomi"
              "platforms" => "PC, PS4, XONE, PS5, Series X"
              "rating" => "70%"
              "screenshots" => [
                0 => [
                  "big" => "//images.igdb.com/igdb/image/upload/t_screenshot_big/scagwj.jpg"
                  "huge" => "//images.igdb.com/igdb/image/upload/t_screenshot_huge/scagwj.jpg"
                ]
                1 => [
                  "big" => "//images.igdb.com/igdb/image/upload/t_screenshot_big/scagwk.jpg"
                  "huge" => "//images.igdb.com/igdb/image/upload/t_screenshot_huge/scagwk.jpg"
                ]
                2 => [
                  "big" => "//images.igdb.com/igdb/image/upload/t_screenshot_big/scagwl.jpg"
                  "huge" => "//images.igdb.com/igdb/image/upload/t_screenshot_huge/scagwl.jpg"
                ]
                3 => [
                  "big" => "//images.igdb.com/igdb/image/upload/t_screenshot_big/scagwm.jpg"
                  "huge" => "//images.igdb.com/igdb/image/upload/t_screenshot_huge/scagwm.jpg"
                ]
                4 => [
                  "big" => "//images.igdb.com/igdb/image/upload/t_screenshot_big/scagwn.jpg"
                  "huge" => "//images.igdb.com/igdb/image/upload/t_screenshot_huge/scagwn.jpg"
                ]
              ]
              "similar_games" => [
                0 => [
                  "id" => 25311
                  "aggregated_rating" => 69.75
                  "cover" => [
                    "id" => 68395
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/rmzcpsfvnizymkhvd0qg.jpg"
                  ]
                  "name" => "Star Control: Origins"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                  ]
                ]
                1 => [
                  "id" => 25646
                  "cover" => [
                    "id" => 82168
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1reg.jpg"
                  ]
                  "name" => "Don't Knock Twice"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                    1 => [
                      "id" => 48
                      "abbreviation" => "PS4"
                    ]
                    2 => [
                      "id" => 49
                      "abbreviation" => "XONE"
                    ]
                    3 => [
                      "id" => 130
                      "abbreviation" => "Switch"
                    ]
                  ]
                ]
                2 => [
                  "id" => 76253
                  "aggregated_rating" => 90.333333333333
                  "cover" => [
                    "id" => 82048
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rb4.jpg"
                  ]
                  "name" => "Devil May Cry 5"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                    1 => [
                      "id" => 48
                      "abbreviation" => "PS4"
                    ]
                    2 => [
                      "id" => 49
                      "abbreviation" => "XONE"
                    ]
                  ]
                ]
                3 => [
                  "id" => 80916
                  "aggregated_rating" => 78.75
                  "cover" => [
                    "id" => 67256
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/fq2ekyx6ac8em4lpv3zj.jpg"
                  ]
                  "name" => "Omensight"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                    1 => [
                      "id" => 48
                      "abbreviation" => "PS4"
                    ]
                    2 => [
                      "id" => 49
                      "abbreviation" => "XONE"
                    ]
                    3 => [
                      "id" => 130
                      "abbreviation" => "Switch"
                    ]
                  ]
                ]
                4 => [
                  "id" => 96217
                  "aggregated_rating" => 54.0
                  "cover" => [
                    "id" => 72919
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1k9j.jpg"
                  ]
                  "name" => "Eternity: The Last Unicorn"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                    1 => [
                      "id" => 48
                      "abbreviation" => "PS4"
                    ]
                    2 => [
                      "id" => 49
                      "abbreviation" => "XONE"
                    ]
                  ]
                ]
                5 => [
                  "id" => 105269
                  "aggregated_rating" => 20.0
                  "cover" => [
                    "id" => 82218
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rfu.jpg"
                  ]
                  "name" => "Gene Rain"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                    1 => [
                      "id" => 48
                      "abbreviation" => "PS4"
                    ]
                    2 => [
                      "id" => 49
                      "abbreviation" => "XONE"
                    ]
                  ]
                ]
                6 => [
                  "id" => 106987
                  "aggregated_rating" => 66.111111111111
                  "cover" => [
                    "id" => 130983
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2t2f.jpg"
                  ]
                  "name" => "Torchlight III"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                    1 => [
                      "id" => 48
                      "abbreviation" => "PS4"
                    ]
                    2 => [
                      "id" => 49
                      "abbreviation" => "XONE"
                    ]
                    3 => [
                      "id" => 130
                      "abbreviation" => "Switch"
                    ]
                  ]
                ]
                7 => [
                  "id" => 111130
                  "cover" => [
                    "id" => 68904
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1h60.jpg"
                  ]
                  "name" => "Apsulov: End of Gods"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                    1 => [
                      "id" => 48
                      "abbreviation" => "PS4"
                    ]
                    2 => [
                      "id" => 49
                      "abbreviation" => "XONE"
                    ]
                    3 => [
                      "id" => 130
                      "abbreviation" => "Switch"
                    ]
                    4 => [
                      "id" => 167
                      "abbreviation" => "PS5"
                    ]
                    5 => [
                      "id" => 169
                      "abbreviation" => "Series X"
                    ]
                  ]
                ]
                8 => [
                  "id" => 113360
                  "cover" => [
                    "id" => 81869
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1r65.jpg"
                  ]
                  "name" => "Hytale"
                  "platforms" => [
                    0 => [
                      "id" => 6
                      "abbreviation" => "PC"
                    ]
                    1 => [
                      "id" => 14
                      "abbreviation" => "Mac"
                    ]
                  ]
                ]
                9 => [
                  "id" => 115283
                  "aggregated_rating" => 89.181818181818
                  "cover" => [
                    "id" => 75166
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1lzy.jpg"
                  ]
                  "name" => "Astral Chain"
                  "platforms" => [
                    0 => [
                      "id" => 130
                      "abbreviation" => "Switch"
                    ]
                  ]
                ]
              ]
              "slug" => "trek-to-yomi"
              "summary" => "As a vow to his dying Master, the young swordsman Hiroki is sworn to protect his town and the people he loves against all threats. Faced with tragedy and bound to duty, the lone samurai must voyage beyond life and death to confront himself and decide his path forward."
              "videos" => [
                0 => [
                  "id" => 50820
                  "game" => 152203
                  "name" => "Trailer"
                  "video_id" => "mwcsoR4rjwY"
                  "checksum" => "e7bbedad-33a3-4336-892c-ce6d804af55d"
                ]
                1 => [
                  "id" => 65312
                  "game" => 152203
                  "name" => "Trailer"
                  "video_id" => "2YSWKW-Pwmo"
                  "checksum" => "ded58c7b-8adc-1c11-665a-040b46e094bf"
                ]
                2 => [
                  "id" => 65504
                  "game" => 152203
                  "name" => "Gameplay Trailer"
                  "video_id" => "qlnfKb7nPSU"
                  "checksum" => "6572ae00-c3e2-f412-f4e2-7ec6ec21d52c"
                ]
                3 => [
                  "id" => 66176
                  "game" => 152203
                  "name" => "Gameplay Video"
                  "video_id" => "1FnqP8K-s7w"
                  "checksum" => "acb870cc-47b1-aded-0a3c-a77830ca5cab"
                ]
              ]
              "websites" => [
                0 => [
                  "id" => 186397
                  "category" => 13
                  "game" => 152203
                  "trusted" => true
                  "url" => "https://store.steampowered.com/app/1370050/Trek_to_Yomi"
                  "checksum" => "093e9421-9a21-a41a-a0f1-d12cb2a7ad4b"
                ]
                1 => [
                  "id" => 186861
                  "category" => 1
                  "game" => 152203
                  "trusted" => false
                  "url" => "https://www.trektoyomi.com/"
                  "checksum" => "aad2c46f-5a6f-c4cb-24dd-1a19addec95e"
                ]
                2 => [
                  "id" => 186862
                  "category" => 5
                  "game" => 152203
                  "trusted" => true
                  "url" => "https://twitter.com/LMenchiari"
                  "checksum" => "5ed2357e-6992-9fa8-95de-46d1c2174df4"
                ]
                3 => [
                  "id" => 218109
                  "category" => 17
                  "game" => 152203
                  "trusted" => true
                  "url" => "https://www.gog.com/game/trek_to_yomi"
                  "checksum" => "ea10e293-26a2-740c-ee02-bdb6412a67d3"
                ]
                4 => [
                  "id" => 281824
                  "category" => 16
                  "game" => 152203
                  "trusted" => true
                  "url" => "https://store.epicgames.com/p/trek-to-yomi-70d134"
                  "checksum" => "28706e29-68b4-178b-facd-8ad933d55487"
                ]
                5 => [
                  "id" => 281876
                  "category" => 18
                  "game" => 152203
                  "trusted" => true
                  "url" => "https://discord.gg/trektoyomi"
                  "checksum" => "e911e0ea-f462-6056-0368-cb8c4efff593"
                ]
                6 => [
                  "id" => 281877
                  "category" => 3
                  "game" => 152203
                  "trusted" => true
                  "url" => "https://en.wikipedia.org/wiki/Trek_to_Yomi"
                  "checksum" => "7a3a0b58-1c2f-9c21-333e-5c21114edb2b"
                ]
              ]
              "coverImageUrl" => "//images.igdb.com/igdb/image/upload/t_cover_big/co4p88.jpg"
              "publisher" => "Flying Wild Hog"
              "trailer" => "https://youtube.com/watch/mwcsoR4rjwY"
              "similarGames" => [
                0 => [
                  "id" => 25311
                  "aggregated_rating" => "70%"
                  "cover" => [
                    "id" => 68395
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/rmzcpsfvnizymkhvd0qg.jpg"
                  ]
                  "name" => "Star Control: Origins"
                  "platforms" => "PC"
                  "coverImageUrl" => "//images.igdb.com/igdb/image/upload/t_cover_big/rmzcpsfvnizymkhvd0qg.jpg"
                  "rating" => null
                  "slug" => "star-control-origins"
                ]
                1 => [
                  "id" => 25646
                  "cover" => [
                    "id" => 82168
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1reg.jpg"
                  ]
                  "name" => "Don't Knock Twice"
                  "platforms" => "PC, PS4, XONE, Switch"
                  "coverImageUrl" => "//images.igdb.com/igdb/image/upload/t_cover_big/co1reg.jpg"
                  "aggregated_rating" => null
                  "rating" => null
                  "slug" => "don't-knock-twice"
                ]
                2 => [
                  "id" => 76253
                  "aggregated_rating" => "90%"
                  "cover" => [
                    "id" => 82048
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rb4.jpg"
                  ]
                  "name" => "Devil May Cry 5"
                  "platforms" => "PC, PS4, XONE"
                  "coverImageUrl" => "//images.igdb.com/igdb/image/upload/t_cover_big/co1rb4.jpg"
                  "rating" => null
                  "slug" => "devil-may-cry-5"
                ]
                3 => [
                  "id" => 80916
                  "aggregated_rating" => "79%"
                  "cover" => [
                    "id" => 67256
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/fq2ekyx6ac8em4lpv3zj.jpg"
                  ]
                  "name" => "Omensight"
                  "platforms" => "PC, PS4, XONE, Switch"
                  "coverImageUrl" => "//images.igdb.com/igdb/image/upload/t_cover_big/fq2ekyx6ac8em4lpv3zj.jpg"
                  "rating" => null
                  "slug" => "omensight"
                ]
                4 => [
                  "id" => 96217
                  "aggregated_rating" => "54%"
                  "cover" => [
                    "id" => 72919
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1k9j.jpg"
                  ]
                  "name" => "Eternity: The Last Unicorn"
                  "platforms" => "PC, PS4, XONE"
                  "coverImageUrl" => "//images.igdb.com/igdb/image/upload/t_cover_big/co1k9j.jpg"
                  "rating" => null
                  "slug" => "eternity-the-last-unicorn"
                ]
                5 => [
                  "id" => 105269
                  "aggregated_rating" => "20%"
                  "cover" => [
                    "id" => 82218
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rfu.jpg"
                  ]
                  "name" => "Gene Rain"
                  "platforms" => "PC, PS4, XONE"
                  "coverImageUrl" => "//images.igdb.com/igdb/image/upload/t_cover_big/co1rfu.jpg"
                  "rating" => null
                  "slug" => "gene-rain"
                ]
              ]
              "social" => [
                "website" => [
                  "id" => 186397
                  "category" => 13
                  "game" => 152203
                  "trusted" => true
                  "url" => "https://store.steampowered.com/app/1370050/Trek_to_Yomi"
                  "checksum" => "093e9421-9a21-a41a-a0f1-d12cb2a7ad4b"
                ]
                "facebook" => null
                "twitter" => [
                  "id" => 186862
                  "category" => 5
                  "game" => 152203
                  "trusted" => true
                  "url" => "https://twitter.com/LMenchiari"
                  "checksum" => "5ed2357e-6992-9fa8-95de-46d1c2174df4"
                ]
                "instagram" => null
              ]
            ]
        ]);
    } */
}
