<?php

namespace App\Repositories\Contracts;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class AbstractRepository
{

    /**
     * String model class (only the class name).
     *
     * @var object
     */
    protected object $clazz;

    public function __construct(string $clazz)
    {
        $this->clazz = (new $clazz()); 
    }

    /**
     * Get paginated models from database.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return $this->clazz->paginate();
    }

    /**
     * Save a model in database.
     *
     * @param array $model
     * @return array
     */
    public function store(array $model): bool
    {
        $store = $this->clazz;
        $store->fill($model);

        return $store->save();   
    }

    /**
     * Update a model with array data.
     *
     * @param Model $model
     * @param array $update
     * @return boolean
     */
    public function update(Model $model, array $update): bool
    {
        return $model->update($update);
    }

    /**
     * Delete a model.
     *
     * @param Model $model
     * @return boolean
     */
    public function destroy(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * Find a model by column name and value.
     *
     * @param string $column
     * @param mixed $value
     * @return Model
     */
    public function findBy(string $column, mixed $value): object|null
    {
        return $this->clazz::where($column, $value)->first();
    }
}