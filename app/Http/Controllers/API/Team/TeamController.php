<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Http\Custom\Response;
use App\Http\Repositories\TeamsRepository;
use App\Http\Resources\TeamResource;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $teamsRepository = null;

    public function __construct(TeamsRepository $teamsRepository)
    {
        $this->teamsRepository = $teamsRepository;
        $this->response = new Response();
    }
    /**
     * List Teams
     *
     * Get the list of teams.
     *
     * @return void
     */
    public function index(){
        $teams = $this->teamsRepository->all();

        return $this->response->withData(true, "The teams listed successfully.", TeamResource::collection($teams));
    }
}
