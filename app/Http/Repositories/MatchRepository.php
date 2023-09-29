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

    public function stage()
    {
        $stage = ['round_of_16', 'quarter_final', 'semi_final', 'final'];
        $matches = Matches::whereIn('stage', $stage)
            ->orderBy('id', 'desc')
            ->take(15)
            ->get();

        return $matches;
    }


    public function reset()
    {
        Matches::truncate();
        MatchesResult::truncate();

        foreach (Team::all() as $team) {
            $team->points = 0;
            $team->save();
        }
    }

}
