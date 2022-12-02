<?php

namespace App\Services;

use App\Models\Group;
use App\Repositories\GroupRepository;
use App\Services\Contracts\AbstractService;

class GroupService extends AbstractService
{

    /**
     * @param GroupRepository $repository
     */
    public function __construct(GroupRepository $repository)
    {
        parent::__construct($repository, Group::class);
    }

    public function clientsByGroupCode(string $code)
    {
        $model = $this->repository->findBy('code', $code);

        if ( $model ) {
            $clients = $model->clients;
            return [
                'status' => 'success',
                'message' => 'Success in get the entities.',
                'data' => $clients
            ];
        }

        return [
            'status' => 'error',
            'message' => 'Entity not found.'
        ];

    }

}