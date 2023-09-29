<?php

namespace App\Http\Resources;

use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $matches = Matches::where('stage','group '.$this->id.' match')->get();
        return [
            'id' => $this->id,
            'group_name' => $this->group_name,
            'teams' => TeamResource::collection($this->teams),
            'matches' => MatchResource::collection($matches),
        ];
    }
}
