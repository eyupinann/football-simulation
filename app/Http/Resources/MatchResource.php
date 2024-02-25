<?php

namespace App\Http\Resources;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'home_team_id' => $this->home_team_id,
            'away_team_id' => $this->away_team_id,
            'home_team' => $this->home->team_name,
            'away_team' => $this->away->team_name,
            'stage' => $this->stage,
            'date' => $this->date,
            'home' => $this->home,
            'away' => $this->away,
        ];
    }
}
