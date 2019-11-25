<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingAddress extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'order_id', 'customer_id', 'name', 'email',
        'phone', 'city', 'district', 'commune', 'village',
        'postcode', 'is_active'
    ];

    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
}
