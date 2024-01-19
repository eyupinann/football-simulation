<?php

namespace App\Http\Controllers\API\Simulation;

use App\Http\Controllers\Controller;
use App\Http\Custom\Response;
use App\Http\Services\SimulationServices;

/**
 * @group Simulation
 *
 * @unauthenticated
 */
class SimulationController extends Controller
{
    public function __construct()
    {
        $this->service = new SimulationServices();
        $this->response = new Response();
    }


    /**
     * Start Simulation
     *
     * Get the start of simulation.
     *
     * @return void
     */
    public function index(){
        $result =  $this->service->simulate();

        return $this->response->withData(true, "The simulation was done successfully.", $result);
    }

    /**
     * Start next Simulation
     *
     * Get the start of simulation.
     *
     * @return void
     */
    public function next(){
        $result =  $this->service->weekSimulate();

        return $this->response->withData(true, "The simulation was done successfully.", $result);
    }


}
