<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Item
 * @package App\Models
 * @version August 3, 2022, 6:28 pm UTC
 *
 * @property \App\Models\Reqest $request
 * @property integer $request_id
 * @property string $name
 * @property integer $qty
 * @property number $price
 * @property number $total
 * @property string $start_date
 * @property string $end_date
 */
class Item extends Model
{
    use SoftDeletes;


    public $table = 'items';


    protected $dates = ['deleted_at'];



    public $guarded= [
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'request_id' => 'integer',
        'name' => 'string',
        'qty' => 'integer',
        'price' => 'double',
        'total' => 'double',
        'start_date' => 'date',
        'end_date' => 'date',
        'category_code' => 'string',
        'contractual_qty'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'name' => 'required',
//        'qty' => 'required|numeric',
//        'price' => 'required|numeric',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function request()
    {
        return $this->belongsTo(\App\Models\Reqest::class, 'request_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'supplier_id', 'id');
    }
}
