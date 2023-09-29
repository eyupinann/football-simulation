<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function players()
    {
        return $this->hasMany(Player::class, 'team_key', 'key');
    }

    public function matches()
    {
        return $this->hasMany(Matches::class, 'home_team_id', 'id')->whereNotIn('stage', ['round_of_16', 'quarter_final', 'semi_final', 'final'])
            ->orWhere(function ($query) {
                $query->where('away_team_id', $this->id)->whereNotIn('stage', ['round_of_16', 'quarter_final', 'semi_final', 'final']);
            });
    }

    public function statistics()
    {
        $matches = $this->hasMany(Matches::class, 'home_team_id', 'id')
            ->orWhere(function ($query) {
                $query->where('away_team_id', $this->id);
            })->get();

        $goalsScored = 0;
        $goalsConceded = 0;

        foreach ($matches as $match) {
            $goalsScored += $match->result->home_team_goals;
            $goalsConceded += $match->result->away_team_goals;
        }

        return [
            'goals_scored' => $goalsScored,
            'goals_conceded' => $goalsConceded,
        ];
    }



}

