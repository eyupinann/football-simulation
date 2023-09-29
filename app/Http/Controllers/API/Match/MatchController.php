<?php

namespace App\Http\Controllers\API\Match;

use App\Http\Controllers\Controller;
use App\Http\Custom\Response;
use App\Http\Repositories\MatchRepository;
use App\Http\Resources\MatchResource;
use App\Models\Matches;
use App\Models\MatchesResult;
use App\Models\Team;
use Illuminate\Http\Request;
/**
 * @group Match
 *
 * @unauthenticated
 */
class MatchController extends Controller
{
    private $matchRepository = null;

    public function __construct(MatchRepository $matchRepository)
    {
        $this->matchRepository = $matchRepository;
        $this->response = new Response();
    }

    /**
     * List Matches
     *
     * Get the list of matches.
     *
     * @return void
     */
    public function index(){
        $matches = $this->matchRepository->stage();

        return $this->response->withData(true, "The matches listed successfully.", MatchResource::collection($matches));
    }


    /**
     * Reset Matches
     *
     * Get the reset of matches.
     * @unauthenticated
     * @return void
     */
    public function reset(){
        $this->matchRepository->reset();
        return  $this->response->withOutData(true, "The matches reseted successfully.");
    }
}
