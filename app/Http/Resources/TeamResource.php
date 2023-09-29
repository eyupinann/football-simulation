<?php

namespace App\Http\Resources;

use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'team_name' => $this->team_name,
            'key' => $this->key,
            'strength' => $this->strength,
            'country_code' => $this->country_code,
            'points' => $this->points,
            'statistics' => $this->statistics(),
            'players' => $this->players,
        ];
    }
}
