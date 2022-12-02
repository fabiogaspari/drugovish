<?php

namespace App\Http\Controllers;

use App\Enums\Level;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    /**
     * The service variable.
     *
     * @var ClientService
     */
    private ClientService $service;


    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        apiAuth($request, [Level::LEVEL2]);
        return $this->service->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        apiAuth($request, [Level::LEVEL1, Level::LEVEL2]);
        return response()->json($this->service->store($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $clientId
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $clientId)
    {
        apiAuth($request, [Level::LEVEL2]);
        return response()->json($this->service->show($clientId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  int  $clientId
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, int $clientId)
    {
        apiAuth($request, [Level::LEVEL2]);
        return response()->json($this->service->update($request->validated(), $clientId));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $clientId
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $clientId)
    {
        apiAuth($request, [Level::LEVEL1, Level::LEVEL2]);
        return response()->json($this->service->destroy($clientId));
    }

}
