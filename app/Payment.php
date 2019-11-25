<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'amount', 'postal_code', 'currency', 'payment_method', 'receipt_email',
        'receipt_url', 'status'
    ];

    protected $with = ['order'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
