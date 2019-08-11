<?php

namespace App\Repositories;

use App\Models\ToDoList as Model;

/**
 * Class ToDoListRepository
 *
 * @package App\Repositories
 */
class ToDoListRepository extends CoreRepository
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
        $columns = [
            'id',
            'title',
            'category_id',
            'due_date',
            'end_date',
            'note',
            'is_ended',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderby('due_date', 'DESC')
            ->with(['category:id,name,web_color_id'])
            ->paginate($perPage);

        return $result;
    }
}
