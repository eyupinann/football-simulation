<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Groups extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                "group_name" => "A",
            ],
            [
                "group_name" => "B",
            ],
            [
                "group_name" => "C",
            ],
            [
                "group_name" => "D",
            ],
            [
                "group_name" => "E",
            ],
            [
                "group_name" => "F",
            ],
            [
                "group_name" => "G",
            ],
            [
                "group_name" => "H",
            ],
        ];


        foreach ($groups as $group) {
            \App\Models\Group::create($group);
        }

    }
}
