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
    public function simulate()
    {
        $matches = Matches::all();

        foreach ($matches as $match) {
            $homeTeam = $match->home;
            $awayTeam = $match->away;

            $homeTeamStrength = $homeTeam->strength;
            $awayTeamStrength = $awayTeam->strength;

            $homeTeamScores = $this->simulateMatch($homeTeamStrength, $awayTeamStrength);
            $homeTeamScore = $homeTeamScores[0];
            $awayTeamScore =  $homeTeamScores[1];

            $winner = ($homeTeamScore > $awayTeamScore) ? $homeTeam->id : (($homeTeamScore < $awayTeamScore) ? $awayTeam->id : 0);


            $matchResult = new MatchesResult([
                'match_id' => $match->id,
                'home_team_goals' => $homeTeamScore,
                'away_team_goals' => $awayTeamScore,
            ]);
            $matchResult->save();

            $this->updateTeamStats($match->home_team_id, $match->away_team_id, $winner);
        }

        $redata = Team::orderBy('points', 'desc')->get();
        return $redata;
    }

    public function weekSimulate(){
        $response = MatchesResult::with('match')->latest()->first();

        if ($response == null){
            $id = 1;
        }else{
            $stage = explode(' ',$response->match->stage);
            $id = $stage[1] + 1;
        }
        
        $matches = Matches::where('stage', 'week '.$id)->get();

        $teams = collect();
        foreach ($matches as $match) {
            $homeTeam = $match->home;
            $awayTeam = $match->away;
            $teams->push($homeTeam, $awayTeam);

            $homeTeamStrength = $homeTeam->strength;
            $awayTeamStrength = $awayTeam->strength;

            $homeTeamScores = $this->simulateMatch($homeTeamStrength, $awayTeamStrength);
            $homeTeamScore = $homeTeamScores[0];
            $awayTeamScore =  $homeTeamScores[1];

            $winner = ($homeTeamScore > $awayTeamScore) ? $homeTeam->id : (($homeTeamScore < $awayTeamScore) ? $awayTeam->id : 0);


            $matchResult = new MatchesResult([
                'match_id' => $match->id,
                'home_team_goals' => $homeTeamScore,
                'away_team_goals' => $awayTeamScore,
            ]);
            $matchResult->save();

            $this->updateTeamStats($match->home_team_id, $match->away_team_id, $winner);
        }

        $finalStandings = $teams->sortByDesc('points');

        $redata = $finalStandings->values()->all();

        return $redata;
    }



    private function updateTeamStats($teamId, $opponentId, $winner)
    {
        $team = Team::find($teamId);
        $opponent = Team::find($opponentId);

        if ($winner == $teamId) {
            $team->win++;
            $team->points += 3;
        } elseif ($winner == 0) {
            $team->draw++;
            $team->points += 1;
            $opponent->draw++;
            $opponent->points += 1;
        } else {
            $team->loss++;
        }



        $goalDifference = $team->goal_difference + ($team->goals_for - $team->goals_against);
        $team->goal_difference = $goalDifference;
        $opponent->goal_difference = -$goalDifference;

        $team->save();
        $opponent->save();
    }

    private function simulateMatch($teamStrength, $opponentStrength)
    {
        $scoreMultiplier = 0.3;
        $strengthDifference = $teamStrength - $opponentStrength;

        $strengthDifference *= 1;

        $teamScore = max(0, round($scoreMultiplier * $strengthDifference));
        $opponentScore = max(0, round($scoreMultiplier * -$strengthDifference));

        if (abs($strengthDifference) < 10 && $teamScore == 0 && $opponentScore == 0) {
            $teamScore = rand(0, 1);
            $opponentScore = rand(0, 1);
        }

        return [$teamScore, $opponentScore];
    }



}
