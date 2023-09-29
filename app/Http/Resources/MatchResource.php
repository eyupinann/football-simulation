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
        $home = Team::where('id', $this->home_team_id)->first();
        $away = Team::where('id', $this->away_team_id)->first();

        return [
            'id' => $this->id,
            'home_team_id' => $this->home_team_id,
            'away_team_id' => $this->away_team_id,
            'home_team' => $home->team_name,
            'away_team' => $away->team_name,
            'stage' => $this->stage,
            'date' => $this->date,
            'result' => MatchResultResource::make($this->result),
        ];
    }
}
