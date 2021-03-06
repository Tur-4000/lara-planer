<?php

namespace App\Repositories;

use App\Models\Category as Model;

/**
 * Class CategoryRepository
 *
 * @package App\Repositories
 */
class CategoryRepository extends CoreRepository
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
        $columns = ['id', 'name', 'slug', 'description', 'web_color_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderby('id')
            ->with(['webColor:id,name,background,color',])
            ->paginate($perPage);

        return $result;
    }

    public function getForComboBox()
    {
        $result = $this
            ->startConditions()
            ->select(['id', 'name'])
            ->toBase()
            ->get();

        return $result;
    }
}
