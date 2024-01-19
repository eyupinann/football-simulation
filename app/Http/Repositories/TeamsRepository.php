<?php

namespace App\Http\Repositories;

use App\Models\Group;
use App\Http\Repositories\BaseRepository;
use App\Models\Team;

class TeamsRepository extends BaseRepository
{
    public function __construct(Team $model = null)
    {
        if ($model === null) {
            $model = new Team();
        }

        parent::__construct($model);
    }

}
