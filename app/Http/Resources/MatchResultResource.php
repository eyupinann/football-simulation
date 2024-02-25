<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'home_team_goals' => $this->home_team_goals,
            'away_team_goals' => $this->away_team_goals,
            'match' => $this->match,
        ];
    }
}
