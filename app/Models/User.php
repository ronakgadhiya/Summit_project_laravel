<?php

namespace App\Models;
use App\Models\{State,Country,City};
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    
    public function country()
    {
        return $this->hasMany(Country::class,'id','country_id');
    }
    public function state()
    {
        return $this->hasMany(State::class,'id','state_id');
    }
    public function city()
    {
        return $this->hasMany(City::class,'id','city_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'country_id',
        'state_id',
        'city_id',
        'f_name',
        'l_name',
        'username',
        'email',
        'password',
        'mobile',
        'status',
        'address',
        'created_by',
        'deleted_by',
        'updated_by'
        
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
