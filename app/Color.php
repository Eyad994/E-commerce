<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'color_name',
        'description',
    ];
    protected $dates = ['deleted_at'];
}
