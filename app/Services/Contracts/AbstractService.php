<?php

namespace App\Services\Contracts;

use App\Models\Abstract;
use App\Repositories\Contracts\AbstractRepository;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractService
{

    /**
     * Abstract repository to manage the database.
     *
     * @var AbstractRepository
     */
    protected AbstractRepository $repository;

    /**
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository, string $clazz)
    {
        $this->clazz = (new $clazz());
        $this->repository = $repository;
    }

    /**
     * Get paginate models from database.
     *
     * @return LengthAwarePaginator
     */
    public function index(): array 
    {
        $index = $this->repository->index();
        
        return [
            'status' => 'success',
            'message' => 'Success to get entities.',
            'paginated_entities' => $index,
        ];
    }

    /**
     * Save a model in database.
     *
     * @param array $model
     * @return array
     */
    public function store(array $model): array 
    {
        if ( $this->repository->findBy('code', data_get($model, 'code')) ) {
            return [
                'status' => 'error',
                'message' => 'The code alread exists.'
            ];
        }

        $this->repository->store($model);

        return [
            'status' => 'success',
            'message' => 'Success in save the entity.'
        ];
    }

    /**
     * Show one model by id.
     *
     * @param integer $modelId
     * @return array
     */
    public function show(int $modelId): array
    {
        $model = $this->repository->findBy('id', $modelId);
        
        if ( $model ) {
            return [
                'status' => 'success',
                'message' => 'Success to found the entity.',
                'data' => $model
            ];
        }

        return [
            'status' => 'error',
            'message' => 'Entity not found.'
        ];
    
        
    }

    /**
     * Update a model by model id.
     *
     * @param Abstract $model
     * @param integer $modelId
     * @return array
     */
    public function update(array $update, int $modelId): array
    {
        $updateAbstract = $this->repository->findBy('id', $modelId);

        if ( $updateAbstract ) {
            $this->repository->update($updateAbstract, $update);
            return [
                'status' => 'success',
                'message' => 'Success in update the entity.'
            ];
        }

        return [
            'status' => 'error',
            'message' => 'Entity not found.'
        ];
    }

    /**
     * Delete a model by id.
     *
     * @param integer $modelId
     * @return boolean
     */
    public function destroy(int $modelId): array
    {
        $model = $this->repository->findBy('id', $modelId);

        if ( $model ) {
            $this->repository->destroy($model);
            return [
                'status' => 'success',
                'message' => 'Success in delete the entity.'
            ];
        }

        return [
            'status' => 'error',
            'message' => 'Entity not found.'
        ];
    }

}