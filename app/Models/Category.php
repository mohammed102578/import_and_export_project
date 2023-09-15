<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Category
 * @package App\Models
 * @version August 3, 2022, 5:07 pm UTC
 *
 * @property string $name
 */
class Category extends Model
{
    use SoftDeletes;


    public $table = 'categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
    public function requests()
    {
        return $this->hasMany(\App\Models\Request::class);
    }


}
