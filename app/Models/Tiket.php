<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;


class Tiket extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tikets';
   
    
    protected $fillable=[
        'user_id',
        'title',
        'subtitle',
        'btntitle',
        'btn',
        'price',
        'status',
        'feature',
        'created_by',
        'deleted_by',
        'updated_by'
    ];
    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->hasMany(User::class,'id','user_id');
    }
    public function featureName()
    {
        return $this->hasMany(Feature::class,'id','feature');
    }
}
