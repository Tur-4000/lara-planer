<?php

namespace App\Repositories;

use App\Models\WebColor as Model;

/**
 * Class WebColorRepository
 *
 * @package App\Repositories
 */
class WebColorRepository extends CoreRepository
{
    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'name'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderby('id')
            ->paginate($perPage);

        return $result;
    }
}
