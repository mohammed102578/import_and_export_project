<?php

namespace App\Repositories;

use App\Models\Request;
use App\Repositories\BaseRepository;

/**
 * Class RequestRepository
 * @package App\Repositories
 * @version August 3, 2022, 5:08 pm UTC
*/

class RequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'ref',
        'code',
        'category_id',
		'link_with',
		'time_req',
		'location_req',
		'type_l_req',
		'type_req'
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
        return Request::class;
    }
}
