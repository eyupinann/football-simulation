<?php

namespace App\Http\Services;

use App\Http\Custom\Response;
use App\Http\Resources\UserResource;
use App\Models\Group;
use App\Models\Matches;
use App\Models\MatchesResult;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SimulationServices
{
    public function simulateKnockoutStage($qualifiedTeams)
    {
        $rounds = [
            'round_of_16' => 8,
            'quarter_final' => 4,
            'semi_final' => 2,
            'final' => 1,
        ];

        $winners = [];

        foreach ($rounds as $round => $matchCount) {
            $roundWinners = [];

            for ($i = 0; $i < $matchCount; $i++) {
                if (empty($qualifiedTeams)) {
                    break;
                }

                $homeTeamIndex = array_rand($qualifiedTeams);
                $homeTeam = $qualifiedTeams[$homeTeamIndex];
                unset($qualifiedTeams[$homeTeamIndex]);
                $qualifiedTeams = array_values($qualifiedTeams);
                if (empty($qualifiedTeams)) {
                    break;
                }
                $awayTeamIndex = array_rand($qualifiedTeams);
                $awayTeam = $qualifiedTeams[$awayTeamIndex];
                unset($qualifiedTeams[$awayTeamIndex]);
                $qualifiedTeams = array_values($qualifiedTeams);

                $result = $this->simulateMatch($homeTeam, $awayTeam);
                $homeGoals = $result['home_goals'];
                $awayGoals = $result['away_goals'];

                $match = Matches::create([
                    'home_team_id' => $homeTeam['id'],
                    'away_team_id' => $awayTeam['id'],
                    'stage' => $round,
                    'date' => now(),
                ]);
                MatchesResult::create([
                    'match_id' => $match->id,
                    'home_team_goals' => $homeGoals,
                    'away_team_goals' => $awayGoals,
                ]);

                if ($homeGoals > $awayGoals) {
                    $roundWinners[] = $homeTeam;
                } elseif ($awayGoals > $homeGoals) {
                    $roundWinners[] = $awayTeam;
                } else {

                }
            }

            $qualifiedTeams = $roundWinners;

            $winners[$round] = $roundWinners;
        }


        $champion = $winners['final'];

        return $champion;
    }


    public function simulate()
    {
        Matches::where('created_at', '<', now()->subMinute())->delete();
        MatchesResult::where('created_at', '<', now()->subMinute())->delete();
        $teams = Team::where('updated_at', '<', now()->subMinute())->get();

        foreach ($teams as $team) {
            $team->points = 0;
            $team->save();
        }

        $groups = Group::all();
        $qualifiedTeams = [];

        $groups = Group::all();

        foreach ($groups as $group) {
            $teams = $group->teams->toArray();
            $teamCount = count($teams);


            for ($i = 0; $i < $teamCount - 1; $i++) {
                for ($j = $i + 1; $j < $teamCount; $j++) {
                    $homeTeam = $teams[$i];
                    $awayTeam = $teams[$j];

                    if (!$this->hasAlreadyPlayed($homeTeam['id'], $awayTeam['id'])) {
                        $result1 = $this->simulateMatch($homeTeam, $awayTeam);
                        $stage1 = 'group ' . ($group->id) . ' match';

                        $match1 = Matches::create([
                            'home_team_id' => $homeTeam['id'],
                            'away_team_id' => $awayTeam['id'],
                            'stage' => $stage1,
                            'date' => now(),
                        ]);

                        MatchesResult::create([
                            'match_id' => $match1->id,
                            'home_team_goals' => $result1['home_goals'],
                            'away_team_goals' => $result1['away_goals'],
                        ]);

                        $result2 = $this->simulateMatch($awayTeam, $homeTeam);
                        $stage2 = 'group ' . ($group->id) . ' match';

                        $match2 = Matches::create([
                            'home_team_id' => $awayTeam['id'],
                            'away_team_id' => $homeTeam['id'],
                            'stage' => $stage2,
                            'date' => now(),
                        ]);

                        MatchesResult::create([
                            'match_id' => $match2->id,
                            'home_team_goals' => $result2['home_goals'],
                            'away_team_goals' => $result2['away_goals'],
                        ]);

                        $this->markMatchAsPlayed($homeTeam['id'], $awayTeam['id']);
                    }
                }
            }
        }


        $qualifiedTeams = [];
        foreach ($groups as $group) {
            $groupQualifiedTeams = $group->getQualifiedTeams()->toArray();

            $qualifiedTeams = array_merge($qualifiedTeams, $groupQualifiedTeams);
        }

        $champion = $this->simulateKnockoutStage($qualifiedTeams);

        if ($champion == null) {
            return $this->simulate();
        }


        return $champion;
    }

    private $playedMatches = [];

    private function hasAlreadyPlayed($team1Id, $team2Id)
    {
        return in_array([$team1Id, $team2Id], $this->playedMatches) || in_array([$team2Id, $team1Id], $this->playedMatches);
    }

    private function markMatchAsPlayed($team1Id, $team2Id)
    {
        $this->playedMatches[] = [$team1Id, $team2Id];
    }

    public function simulateMatch($homeTeam, $awayTeam)
    {

        $homeTeamStrength = $homeTeam['strength'];
        $awayTeamStrength = $awayTeam['strength'];

        $homeTeamStrength += 1;

        $awayTeamStrength -= 1;

        $maxPossibleGoals = min($homeTeamStrength + $awayTeamStrength, 5);

        $homeGoals = rand(0, $maxPossibleGoals);
        $awayGoals = rand(0, $maxPossibleGoals);

        $homeTeamModel = Team::find($homeTeam['id']);
        $awayTeamModel = Team::find($awayTeam['id']);

        if ($homeGoals > $awayGoals) {
            $homeTeamModel->points += 3;
        } elseif ($homeGoals === $awayGoals) {
            $homeTeamModel->points += 1;
            $awayTeamModel->points += 1;
        } else {
            $awayTeamModel->points += 3;
        }

        $homeTeamModel->save();
        $awayTeamModel->save();

        return [
            'home_goals' => $homeGoals,
            'away_goals' => $awayGoals,
        ];
    }


}
