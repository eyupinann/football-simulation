<?php

namespace App\Http\Repositories;

use App\Models\Group;
use App\Http\Repositories\BaseRepository;

class GroupRepository extends BaseRepository
{
    public function __construct(Group $model = null)
    {
        if ($model === null) {
            $model = new Group();
        }

        parent::__construct($model);
    }

}
