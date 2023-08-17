<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name',
        'code',
        'status',
        'deleted_by',
        'created_by',
        'updated_by'
    ];
    protected $dates = ['deleted_at'];
}
