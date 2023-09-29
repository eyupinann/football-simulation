<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Teams extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                "team_name" => "Manchester City",
                "key" => "manchester_city",
                "strength" => 98,
                "group_id" => 0,
                "country_code" => "en",
                "points" => 0
            ],
            [
                "team_name" => "Manchester United",
                "key" => "manchester_united",
                "strength" => 95,
                "group_id" => 0,
                "country_code" => "en",
                   "points" => 0
            ],
            [
                "team_name" => "Real Madrid",
                "key" => "real_madrid",
                "strength" => 97,
                "group_id" => 0,
                "country_code" => "es",
                "points" => 0
            ],
            [
                "team_name" => "Barcelona",
                "key" => "barcelona",
                "strength" => 96,
                "group_id" => 0,
                "country_code" => "es",
                "points" => 0
            ],
            [
                "team_name" => "Bayern Munich",
                "key" => "bayern_munich",
                "strength" => 92,
                "group_id" => 0,
                "country_code" => "de",
                "points" => 0
            ],
            [
                "team_name" => "Borussia Dortmund",
                "key" => "borussia_dortmund",
                "strength" => 90,
                "group_id" => 0,
                "country_code" => "de",
                "points" => 0
            ],
            [
                "team_name" => "Paris Saint-Germain",
                "key" => "paris_saint_germain",
                "strength" => 94,
                "group_id" => 0,
                "country_code" => "fr",
                "points" => 0
            ],
            [
                "team_name" => "Olympique de Marseille",
                "key" => "olympique_marseille",
                "strength" => 89,
                "group_id" => 0,
                "country_code" => "fr",
                "points" => 0
            ],
            [
                "team_name" => "Liverpool",
                "key" => "liverpool",
                "strength" => 93,
                "group_id" => 0,
                "country_code" => "en",
                "points" => 0
            ],
            [
                "team_name" => "Chelsea",
                "key" => "chelsea",
                "strength" => 91,
                "group_id" => 0,
                "country_code" => "en",
                "points" => 0
            ],
            [
                "team_name" => "Atletico Madrid",
                "key" => "atletico_madrid",
                "strength" => 88,
                "group_id" => 0,
                "country_code" => "es",
                "points" => 0
            ],
            [
                "team_name" => "Sevilla",
                "key" => "sevilla",
                "strength" => 87,
                "group_id" => 0,
                "country_code" => "es",
                "points" => 0
            ],
            [
                "team_name" => "AC Milan",
                "key" => "ac_milan",
                "strength" => 86,
                "group_id" => 0,
                "country_code" => "it",
                "points" => 0
            ],
            [
                "team_name" => "Inter Milan",
                "key" => "inter_milan",
                "strength" => 85,
                "group_id" => 0,
                "country_code" => "it",
                "points" => 0
            ],
            [
                "team_name" => "Ajax",
                "key" => "ajax",
                "strength" => 84,
                "group_id" => 0,
                "country_code" => "nl",
                "points" => 0
            ],
            [
                "team_name" => "PSV Eindhoven",
                "key" => "psv_eindhoven",
                "strength" => 83,
                "group_id" => 0,
                "country_code" => "nl",
                "points" => 0
            ],
            [
                "team_name" => "Porto",
                "key" => "porto",
                "strength" => 82,
                "group_id" => 0,
                "country_code" => "pt",
                "points" => 0
            ],
            [
                "team_name" => "Benfica",
                "key" => "benfica",
                "strength" => 81,
                "group_id" => 0,
                "country_code" => "pt",
                "points" => 0
            ],
            [
                "team_name" => "Zenit St. Petersburg",
                "key" => "zenit_st_petersburg",
                "strength" => 80,
                "group_id" => 0,
                "country_code" => "ru",
                "points" => 0
            ],
            [
                "team_name" => "CSKA Moscow",
                "key" => "cska_moscow",
                "strength" => 79,
                "group_id" => 0,
                "country_code" => "ru",
                "points" => 0
            ],
            [
                "team_name" => "RB Leipzig",
                "key" => "rb_leipzig",
                "strength" => 78,
                "group_id" => 0,
                "country_code" => "de",
                "points" => 0
            ],
            [
                "team_name" => "Bayer Leverkusen",
                "key" => "bayer_leverkusen",
                "strength" => 77,
                "group_id" => 0,
                "country_code" => "de",
                "points" => 0
            ],
            [
                "team_name" => "Napoli",
                "key" => "napoli",
                "strength" => 76,
                "group_id" => 0,
                "country_code" => "it",
                "points" => 0
            ],
            [
                "team_name" => "Roma",
                "key" => "roma",
                "strength" => 75,
                "group_id" => 0,
                "country_code" => "it",
                "points" => 0
            ],
            [
                "team_name" => "Galatasaray",
                "key" => "galatasaray",
                "strength" => 74,
                "group_id" => 0,
                "country_code" => "tr",
                "points" => 0
            ],
            [
                "team_name" => "Fenerbahce",
                "key" => "fenerbahce",
                "strength" => 73,
                "group_id" => 0,
                "country_code" => "tr",
                "points" => 0
            ],
            [
                "team_name" => "Besiktas",
                "key" => "besiktas",
                "strength" => 72,
                "group_id" => 0,
                "country_code" => "tr",
                "points" => 0
            ],
            [
                "team_name" => "Trabzonspor",
                "key" => "trabzonspor",
                "strength" => 71,
                "group_id" => 0,
                "country_code" => "tr",
                "points" => 0
            ],
            [
                "team_name" => "Olympiacos",
                "key" => "olympiacos",
                "strength" => 72,
                "group_id" => 0,
                "country_code" => "gr",
                "points" => 0
            ],
            [
                "team_name" => "Shakhtar Donetsk",
                "key" => "shakhtar_donetsk",
                "strength" => 71,
                "group_id" => 0,
                "country_code" => "ua",
                "points" => 0
            ],
            [
                "team_name" => "Dynamo Kyiv",
                "key" => "dynamo_kyiv",
                "strength" => 70,
                "group_id" => 0,
                "country_code" => "ua",
                "points" => 0
            ],
            [
                "team_name" => "Celtic",
                "key" => "celtic",
                "strength" => 69,
                "group_id" => 0,
                "country_code" => "sc",
                "points" => 0
            ],

        ];


        foreach ($teams as $team) {
            \App\Models\Team::create($team);
        }

    }
}
