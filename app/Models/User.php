<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable, HasApiTokens;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [ ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAvatarPathAttribute()
    {
            return asset('public/uploads/' . $this->avatar);


        //return asset(Storage::url($this->avatar));
    }
    public function getAvatarPath2Attribute()
    {
       // return asset('public/uploads/' . $this->avatar);
    }
    public function carts()
    {
        $carts= $this->hasMany(\App\Models\Cart::class);
        return $carts->where('cart_id',null);
    }
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }
    public function promocode()
    {
        $promocode= $this->belongsToMany(\App\Models\Promocode::class,'user_promocodes');

        $promocode->where('expire_at', '>=', date('Y-m-d'));
        return $promocode;

    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
