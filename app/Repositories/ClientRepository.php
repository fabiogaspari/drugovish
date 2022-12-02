<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\AbstractRepository;

class ClientRepository extends AbstractRepository
{

    public function __construct()
    {
        parent::__construct(Client::class);
    }

}