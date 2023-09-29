<?php

namespace App\Http\Controllers\API\Group;

use App\Http\Controllers\Controller;
use App\Http\Custom\Response;
use App\Http\Repositories\GroupRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * @group Group
 *
 * @unauthenticated
 */
class GroupController extends Controller
{
    private $groupRepository = null;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
        $this->response = new Response();
    }

    /**
     * List Groups
     *
     * Get the list of groups.
     *
     * @return void
     */
    public function index()
    {
        $groups = $this->groupRepository->all();

        return $this->response->withData(true, "The groups listed successfully.", GroupResource::collection($groups));
    }
}
