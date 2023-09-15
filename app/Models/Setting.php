<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Setting
 * @package App\Models
 * @version August 17, 2022, 11:38 am UTC
 *
 * @property string $logo
 * @property string $name
 */
class Setting extends Model
{
    use SoftDeletes;


    public $table = 'settings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'logo',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'logo' => 'string',
        'name' => 'string'
    ];
    public function getLogoPathAttribute()
    {
            return asset('public/uploads/' . $this->logo);
    }
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
