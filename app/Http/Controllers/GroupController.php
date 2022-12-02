<?php

namespace App\Http\Controllers;

use App\Enums\Level;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Services\GroupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    /**
     * The service variable.
     *
     * @var GroupService
     */
    private GroupService $service;


    public function __construct(GroupService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        apiAuth($request, [Level::LEVEL1, Level::LEVEL2]);
        return response()->json($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreGroupRequest $request)
    {
        apiAuth($request, [Level::LEVEL2]);
        return response()->json($this->service->store($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $groupId
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, int $groupId)
    {
        apiAuth($request, [Level::LEVEL1, Level::LEVEL2]);
        return response()->json($this->service->show($groupId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateGroupRequest  $request
     * @param int $groupId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateGroupRequest $request, int $groupId)
    {
        apiAuth($request, [Level::LEVEL2]);
        return response()->json($this->service->update($request->validated(), $groupId));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int  $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $groupId)
    {
        apiAuth($request, [Level::LEVEL2]);
        return response()->json($this->service->destroy($groupId));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  string $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientsByGroup(Request $request, string $code)
    {
        apiAuth($request, [Level::LEVEL2]);
        return response()->json($this->service->clientsByGroupCode($code));
    }
}
