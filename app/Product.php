<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'product_code',
        'product_name',
        'qty',
        'price',
        'is_active',
        'description',
        'image',
    ];

    protected $dates = ['deleted_at'];

    public static function image($fileName, $product)
    {
        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('image/products/', $fileName);
            $product->image = $fileName;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function favorite()
    {
        $cid = auth()->guard('customer')->user() != null ? auth()->guard('customer')->user()->id : null;
        return $this->belongsTo(CustomerProductFavorite::class, 'id', 'product_id')
            ->where('customer_id', $cid);
    }

    public function like()
    {
        return $this->favorite()->selectRaw('product_id,count(*) as count')
            ->groupBy('product_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

}
