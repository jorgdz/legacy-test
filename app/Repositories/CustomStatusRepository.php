<?php

namespace App\Repositories;

use App\Models\CustomStatus;
use App\Repositories\Base\BaseRepository;

class CustomStatusRepository extends BaseRepository
{
    protected $fields = ['name', 'group', 'keyword'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CustomStatus $status)
    {
        parent::__construct($status);
    }

    public function all($request)
    {
        if (isset($request['data'])) {
            return $this->getTypeQuery($request['data']);
        }

        return $this->data
            ->withModelRelations($this->relations)
            ->searchWithColumnNames($request)
            ->searchWithConditions($request)
            ->filter(
                $request,
                $this->fields,
                $this->model->getRelations(),
                $this->model->getKeyName(),
                $this->model->getTable()
            )
            ->paginated($request, $this->model->getTable());
    }

    private function getTypeQuery($type)
    {
        switch ($type) {
            case 'all':
                return $this->data->withOutPaginate($this->selected)->getCollection();
                break;

            case 'group':
                return collect($this->data->withOutPaginate($this->selected)->getCollection())->groupBy('group');
                break;

            default:
                return [];
                break;
        }
    }
}
