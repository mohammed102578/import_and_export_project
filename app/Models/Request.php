<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Request
 * @package App\Models
 * @version August 3, 2022, 5:08 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $categories
 * @property string $name
 * @property string $ref
 * @property string $code
 * @property integer $category_id
 */
class Request extends Model
{
    use SoftDeletes;


    public $table = 'requests';


    protected $dates = ['deleted_at'];



    public $guarded = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'supplier_id' => 'integer',
        'name' => 'string',
		'type_req' => 'string',
        'ref' => 'string',
        'kind_h' => 'string',
        'code' => 'string',
        'title' => 'string',
        'name_et' => 'string',
        'category_id' => 'integer',
		'link_with' => 'integer',
		'time_req' => 'string',
		'location_req' => 'string',
		'type_l_req' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'ref' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function items()
    {
        return $this->hasMany(\App\Models\Item::class, 'request_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by', 'id');
    }
}
