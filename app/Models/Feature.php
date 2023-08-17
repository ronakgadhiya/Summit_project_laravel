<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name',
        'status',
        'created_by',
        'deleted_by',
        'updated_by'
    ];
    protected $dates = ['deleted_at'];
}
