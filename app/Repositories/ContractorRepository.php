<?php

namespace App\Repositories;

use App\Models\Contractor;
use App\Repositories\BaseRepository;

/**
 * Class ContractorRepository
 * @package App\Repositories
 * @version August 23, 2022, 8:44 am UTC
*/

class ContractorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'mobile',
        'responsible_name',
        'responsible_mobile',
        'created_by'
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
        return Contractor::class;
    }
}
