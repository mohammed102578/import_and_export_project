<?php

namespace App\Repositories;

use App\Models\Log;
use App\Repositories\BaseRepository;

/**
 * Class LogRepository
 * @package App\Repositories
 * @version November 16, 2021, 7:30 pm UTC
*/

class LogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'process_ar',
        'process_en',
        'key'
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
        return Log::class;
    }
}
