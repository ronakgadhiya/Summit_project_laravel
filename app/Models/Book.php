<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'aboutspeacks_id',
        'tiket_id',
        'lastname',
        'firstname',
        'email',
        'mobile',
        'address',
        'created_by',
        'deleted_by',
        'updated_by'
    ];
    protected $dates = ['deleted_at'];

    public function tiket()
    {
        return $this->hasMany(Tiket::class,'id','tiket_id');
    }
}
