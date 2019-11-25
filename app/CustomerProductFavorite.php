<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerProductFavorite extends Model
{
    use SoftDeletes;
    protected  $fillable = ['product_id', 'customer_id'];
    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
