<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Contractor
 * @package App\Models
 * @version August 23, 2022, 8:44 am UTC
 *
 * @property string $name
 * @property string $address
 * @property string $mobile
 * @property string $website_url
 * @property string $responsible_name
 * @property string $responsible_mobile
 * @property integer $created_by
 */
class Contractor extends Model
{
    use SoftDeletes;


    public $table = 'contractors';


    protected $dates = ['deleted_at'];



    public $guarded = [
    ];
    public function getAttachmentsPathAttribute()
    {
        return asset('public/uploads/' . $this->attachments);
    }
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'mobile' => 'string',
        'website_url' => 'string',
        'responsible_name' => 'string',
        'responsible_mobile' => 'string',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function createdBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by', 'id');
    }
}
