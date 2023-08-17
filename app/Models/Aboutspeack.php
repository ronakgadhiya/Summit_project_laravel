<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aboutspeack extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name',
        'title',
        'position',
        'status',
        'created_by',
        'deleted_by',
        'updated_by'
    ];
    protected $dates = ['deleted_at'];
}
