<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teams()
    {
        return $this->hasMany(Team::class, 'group_id', 'id')->orderBy('points', 'desc');
    }

    public function getQualifiedTeams()
    {
        return $this->teams()
            ->orderByDesc('points')
            ->take(2)
            ->get();
    }
}
