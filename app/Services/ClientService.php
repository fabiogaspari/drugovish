<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\ClientRepository;
use App\Services\Contracts\AbstractService;

class ClientService extends AbstractService
{

    /**
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        parent::__construct($repository, Client::class);
    }

}