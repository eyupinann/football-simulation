<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Players extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = [
            [
                "player_name" => "Ederson",
                "team_key" => "manchester_city",
                "strength" => 89
            ],
            [
                "player_name" => "Kyle Walker",
                "team_key" => "manchester_city",
                "strength" => 87
            ],
            [
                "player_name" => "David De Gea",
                "team_key" => "manchester_united",
                "strength" => 85
            ],
            [
                "player_name" => "Marcus Rashford",
                "team_key" => "manchester_united",
                "strength" => 84
            ],
            [
                "player_name" => "Thibaut Courtois",
                "team_key" => "real_madrid",
                "strength" => 88
            ],
            [
                "player_name" => "Karim Benzema",
                "team_key" => "real_madrid",
                "strength" => 89
            ],
            [
                "player_name" => "Lionel Messi",
                "team_key" => "barcelona",
                "strength" => 94
            ],
            [
                "player_name" => "Gerard Piqué",
                "team_key" => "barcelona",
                "strength" => 85
            ],
            [
                "player_name" => "Robert Lewandowski",
                "team_key" => "bayern_munich",
                "strength" => 92
            ],
            [
                "player_name" => "Thomas Müller",
                "team_key" => "bayern_munich",
                "strength" => 88
            ],
            [
                "player_name" => "Erling Haaland",
                "team_key" => "borussia_dortmund",
                "strength" => 89
            ],
            [
                "player_name" => "Jadon Sancho",
                "team_key" => "borussia_dortmund",
                "strength" => 87
            ],
            [
                "player_name" => "Neymar Jr.",
                "team_key" => "paris_saint_germain",
                "strength" => 93
            ],
            [
                "player_name" => "Kylian Mbappé",
                "team_key" => "paris_saint_germain",
                "strength" => 92
            ],
            [
                "player_name" => "Dimitri Payet",
                "team_key" => "olympique_marseille",
                "strength" => 86
            ],
            [
                "player_name" => "Florian Thauvin",
                "team_key" => "olympique_marseille",
                "strength" => 85
            ],
            [
                "player_name" => "Mohamed Salah",
                "team_key" => "liverpool",
                "strength" => 90
            ],
            [
                "player_name" => "Sadio Mané",
                "team_key" => "liverpool",
                "strength" => 89
            ],
            [
                "player_name" => "João Félix",
                "team_key" => "atletico_madrid",
                "strength" => 86
            ],
            [
                "player_name" => "Koke",
                "team_key" => "atletico_madrid",
                "strength" => 85
            ],
            [
                "player_name" => "Lucas Ocampos",
                "team_key" => "sevilla",
                "strength" => 84
            ],
            [
                "player_name" => "Jules Koundé",
                "team_key" => "sevilla",
                "strength" => 83
            ],
            [
                "player_name" => "Zlatan Ibrahimović",
                "team_key" => "ac_milan",
                "strength" => 85
            ],
            [
                "player_name" => "Gianluigi Donnarumma",
                "team_key" => "ac_milan",
                "strength" => 88
            ],
            [
                "player_name" => "Romelu Lukaku",
                "team_key" => "inter_milan",
                "strength" => 88
            ],
            [
                "player_name" => "Achraf Hakimi",
                "team_key" => "inter_milan",
                "strength" => 85
            ],
            [
                "player_name" => "Dusan Tadić",
                "team_key" => "ajax",
                "strength" => 84
            ],
            [
                "player_name" => "Daley Blind",
                "team_key" => "ajax",
                "strength" => 83
            ],
            [
                "player_name" => "Mario Götze",
                "team_key" => "psv_eindhoven",
                "strength" => 83
            ],
            [
                "player_name" => "Cody Gakpo",
                "team_key" => "psv_eindhoven",
                "strength" => 82
            ],
            [
                "player_name" => "Pepe",
                "team_key" => "porto",
                "strength" => 83
            ],
            [
                "player_name" => "Rafa Silva",
                "team_key" => "porto",
                "strength" => 82
            ],
            [
                "player_name" => "Artem Dzyuba",
                "team_key" => "zenit_st_petersburg",
                "strength" => 81
            ],
            [
                "player_name" => "Malcom",
                "team_key" => "zenit_st_petersburg",
                "strength" => 80
            ],
            [
                "player_name" => "Fedor Chalov",
                "team_key" => "cska_moscow",
                "strength" => 80
            ],
            [
                "player_name" => "Igor Akinfeev",
                "team_key" => "cska_moscow",
                "strength" => 81
            ],
            [
                "player_name" => "Ivan Savanovic",
                "team_key" => "rb_leipzig",
                "strength" => 79
            ],
            [
                "player_name" => "Patrik Schick",
                "team_key" => "rb_leipzig",
                "strength" => 82
            ],
            [
                "player_name" => "Moussa Diaby",
                "team_key" => "bayer_leverkusen",
                "strength" => 78
            ],
            [
                "player_name" => "Kerem Demirbay",
                "team_key" => "bayer_leverkusen",
                "strength" => 80
            ],
            [
                "player_name" => "Lorenzo Insigne",
                "team_key" => "napoli",
                "strength" => 85
            ],
            [
                "player_name" => "Kostas Manolas",
                "team_key" => "napoli",
                "strength" => 83
            ],
            [
                "player_name" => "Tammy Abraham",
                "team_key" => "roma",
                "strength" => 82
            ],
            [
                "player_name" => "Lorenzo Pellegrini",
                "team_key" => "roma",
                "strength" => 81
            ],
            [
                "player_name" => "İrfan Can Kahveci",
                "team_key" => "fenerbahce",
                "strength" => 81
            ],
            [
                "player_name" => "Ferdi Kadıoğlu",
                "team_key" => "fenerbahce",
                "strength" => 83
            ],
            [
                "player_name" => "Rachid Ghezzal",
                "team_key" => "besiktas",
                "strength" => 80
            ],
            [
                "player_name" => "Vincent Aboubakar",
                "team_key" => "besiktas",
                "strength" => 82
            ],
            [
                "player_name" => "Kerem Aktürkoğlu",
                "team_key" => "galatasaray",
                "strength" => 79
            ],
            [
                "player_name" => "Mauro Icardi",
                "team_key" => "galatasaray",
                "strength" => 84
            ],
            [
                "player_name" => "Uğurcan Çakır",
                "team_key" => "trabzonspor",
                "strength" => 78
            ],
            [
                "player_name" => "Abdülkadir Ömür",
                "team_key" => "trabzonspor",
                "strength" => 77
            ],
            [
                "player_name" => "Yann M'Vila",
                "team_key" => "olympiacos",
                "strength" => 76
            ],
            [
                "player_name" => "Ahmed Hassan Koka",
                "team_key" => "olympiacos",
                "strength" => 75
            ],
            [
                "player_name" => "Odsonne Edouard",
                "team_key" => "celtic",
                "strength" => 80
            ],
            [
                "player_name" => "Callum McGregor",
                "team_key" => "celtic",
                "strength" => 81
            ],
            [
                "player_name" => "Viktor Tsygankov",
                "team_key" => "dynamo_kyiv",
                "strength" => 82
            ],
            [
                "player_name" => "Gerson Rodrigues",
                "team_key" => "dynamo_kyiv",
                "strength" => 79
            ],
            [
                "player_name" => "Taison",
                "team_key" => "shakhtar_donetsk",
                "strength" => 84
            ],
            [
                "player_name" => "Alan Patrick",
                "team_key" => "shakhtar_donetsk",
                "strength" => 83
            ],
            [
                "player_name" => "Di Maria",
                "team_key" => "benfica",
                "strength" => 87
            ],
            [
                "player_name" => "Rafa Silva",
                "team_key" => "benfica",
                "strength" => 84
            ],
            [
                "player_name" => "Reece James",
                "team_key" => "chelsea",
                "strength" => 82
            ],
            [
                "player_name" => "Enzo Fernandez",
                "team_key" => "chelsea",
                "strength" => 80
            ]
        ];

        foreach ($players as $player) {
            \App\Models\Player::create($player);
        }
    }
}
