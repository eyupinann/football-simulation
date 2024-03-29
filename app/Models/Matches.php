<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function result()
    {
        return $this->hasOne(MatchesResult::class, 'match_id', 'id');
    }

    public function home()
    {
        return $this->hasOne(Team::class, 'id', 'home_team_id');
    }

    public function away()
    {
        return $this->hasOne(Team::class, 'id', 'away_team_id');
    }
}
