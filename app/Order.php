<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id', 'user_id', 'deliver_id', 'payment_id',
        'status_id', 'coupon_id', 'transaction_date',
    ];

    protected $dates = ['deleted_at'];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        $id = auth()->guard('customer')->user()->id;
        return $this->belongsTo(Customer::class, 'user_id')->where('id', $id);
    }
}
