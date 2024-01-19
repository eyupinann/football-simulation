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
                "team_name" => "Liverpool",
                "key" => "liverpool",
                "strength" => 91,
                "group_id" => 0,
                "country_code" => "en",
                "points" => 0
            ],
            [
                "team_name" => "Chelsea",
                "key" => "chelsea",
                "strength" => 85,
                "group_id" => 0,
                "country_code" => "en",
                "points" => 0
            ],
            [
                "team_name" => "Arsenal",
                "key" => "arsenal",
                "strength" => 88,
                "group_id" => 0,
                "country_code" => "en",
                "points" => 0
            ],


        ];


        foreach ($teams as $team) {
            \App\Models\Team::create($team);
        }

    }
}
