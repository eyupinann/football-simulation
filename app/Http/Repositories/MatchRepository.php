<?php

namespace App\Http\Repositories;

use App\Models\Matches;
use App\Http\Repositories\BaseRepository;
use App\Models\MatchesResult;
use App\Models\Team;

class MatchRepository extends BaseRepository
{
    public function __construct(Matches $model = null)
    {
        if ($model === null) {
            $model = new Matches();
        }

        parent::__construct($model);
    }

    public function fixture()
    {
        $teams = Team::orderBy('id')->get();
        $totalTeams = count($teams);
        $matches = [];

        for ($week = 1; $week <= $totalTeams - 1; $week++) {
            if ($week <= 3) {
                for ($i = 0; $i < $totalTeams / 2; $i++) {
                    $homeTeamIndex = $i;
                    $awayTeamIndex = $totalTeams - 1 - $i;

                    $homeTeam = $teams[$homeTeamIndex];
                    $awayTeam = $teams[$awayTeamIndex];

                    if ($homeTeam->id !== $awayTeam->id) {
                        $fixture = Matches::create([
                            'home_team_id' => $homeTeam->id,
                            'away_team_id' => $awayTeam->id,
                            'date' => now(),
                            'stage' => 'week ' . $week,
                        ]);

                        $fixture2 = Matches::create([
                            'home_team_id' => $awayTeam->id,
                            'away_team_id' => $homeTeam->id,
                            'date' => now(),
                            'stage' => 'week ' . ($week + 3),
                        ]);

                        $matches[] = $fixture;
                        $matches[] = $fixture2;
                    }
                }
            }

            $temp = $teams[$totalTeams - 1];
            for ($i = $totalTeams - 1; $i > 1; $i--) {
                $teams[$i] = $teams[$i - 1];
            }
            $teams[1] = $temp;
        }

        $matches = collect($matches)->sortBy('stage')->values()->all();

        return $matches;
    }

    public function reset()
    {
        Matches::truncate();
        MatchesResult::truncate();

        $teams = Team::all();

        foreach ($teams as $team) {
            $team->update([
                'win' => 0,
                'draw' => 0,
                'loss' => 0,
                'points' => 0,
                'goal_difference' => '0',
            ]);
        }

        return true;
    }

    public function result(){
        $this->model = MatchesResult::with('match.home', 'match.away')->orderBy('created_at', 'desc')->take(2)->get();

        return $this->model;
    }
}
