<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchesResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function match()
    {
        return $this->hasOne(Matches::class, 'id', 'match_id');
    }

}
