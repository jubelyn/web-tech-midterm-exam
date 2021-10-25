<?php

namespace App\Repositories;

use App\Models\Inventory;
use App\Repositories\BaseRepository;

/**
 * Class InventoryRepository
 * @package App\Repositories
 * @version October 25, 2021, 1:21 am UTC
*/

class InventoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product',
        'stocks',
        'price'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Inventory::class;
    }
}
