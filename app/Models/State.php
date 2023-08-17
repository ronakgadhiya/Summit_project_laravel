<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Country;

class State extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Country()
    {
        return $this->hasMany(Country::class,'id','country_id');
    }
    protected $fillable=[
        'country_id',
        'name',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    protected $dates = ['deleted_at'];
}
