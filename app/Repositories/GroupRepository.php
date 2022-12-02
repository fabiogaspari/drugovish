<?php

namespace App\Repositories;

use App\Models\Group;
use App\Repositories\Contracts\AbstractRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class GroupRepository extends AbstractRepository
{

    public function __construct()
    {
        parent::__construct(Group::class);
    }

}