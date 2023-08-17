<?php

namespace App\Models;

use App\Models\{State,Country};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function state()
    {
        return $this->hasMany(State::class,'id','state_id');
    }
    public function country()
    {
        return $this->hasMany(Country::class,'id','country_id');
    }
    
    protected $fillable=[
        'country_id',
        'state_id',
        'name',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    protected $dates = ['deleted_at'];
}
