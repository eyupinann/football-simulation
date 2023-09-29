<?php

namespace App\Http\Repositories;

use App\Models\MatchesResult;
use App\Http\Repositories\BaseRepository;

class MatchResultRepository extends BaseRepository
{
    public function __construct(MatchesResult $model = null)
    {
        if ($model === null) {
            $model = new MatchesResult();
        }

        parent::__construct($model);
    }

}
